<?php

namespace App\Livewire\Suplai;

use App\Models\BahanMaterial;
use App\Models\KegiatanProyek;
use App\Models\Proyek;
use App\Models\SuplaiBahan;
use App\Models\Tukang;
use Livewire\Component;

class SuplaiCreate extends Component
{
    public $suplai_id, $id_kegiatan,$id_bahan,$jumlah=1,$tanggal,$keterangan,$kegiatans=[],$id_proyek,$status=1,$id_tukang;
    public function mount($id=null){
        $this->tanggal = date('Y-m-d');
        $level = auth()->user()->level;
        if ($level==2) {
            $tuk =  Tukang::where('id_user')->first();
            $this->id_tukang = $tuk ? $tuk->id_tukang : null;
        }
        if($id){
            $this->suplai_id = $id;
            $data = SuplaiBahan::find($id);
            $this->id_kegiatan = $data->id_kegiatan;
            $this->id_bahan = $data->id_bahan;
            $this->jumlah = $data->jumlah;
            $this->id_tukang = $data->id_tukang;
            $this->status = $data->status;
            $this->keterangan = $data->keterangan;
            $this->tanggal = $data->tanggal;
        }
    }
    public function render()
    {
        $proyeks  = Proyek::all();
        $bahans = BahanMaterial::all();
        $tukangs = Tukang::all();
        return view('livewire.suplai.suplai-create',compact('proyeks','bahans','tukangs'));
    }
    public function getProyek(){
        $this->kegiatans = KegiatanProyek::where('id_proyek',$this->id_proyek)->get();
    }

    public function store(){
        $this->validate([
            'id_kegiatan' => 'required',
            'tanggal' => 'required',
            'id_bahan' => 'required',
            'jumlah' => 'required'
        ]);
        SuplaiBahan::updateOrCreate([
            'id' => $this->suplai_id
        ],[
            'id_kegiatan' => $this->id_kegiatan,
            'id_bahan' => $this->id_bahan,
            'tanggal' => $this->tanggal,
            'jumlah' => $this->jumlah,
            'id_tukang' => $this->id_tukang,
            'status' => $this->status,
            'keterangan' => $this->keterangan
        ]);
        $this->alertSuccess('Data Berhasil diperbaharui');
        return redirect()->route('suplai');
    }

    public function alertSuccess($message)
    {
        $this->dispatch(
            'alert',
            ['type' => 'success',  'message' => $message]
        );
    }
}
