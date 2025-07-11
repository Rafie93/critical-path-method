<?php

namespace App\Livewire\Aktivitas;

use App\Models\AktivitasProyek;
use App\Models\KegiatanProyek;
use App\Models\Proyek;
use Livewire\Component;

class AktivitasCreate extends Component
{
    public $id_kegiatan,$alamat,$list_kegiatan,$progress_old,$id_aktivitas ,
    $id_proyek,$nama_aktivitas,$tgl_aktivitas,$status="aktif",$progress_kegiatan,$id_tukang,$keterangan;
    public function mount($id_aktivitas=null){
        $this->tgl_aktivitas = date('Y-m-d');
        if ($id_aktivitas) {
           $data = AktivitasProyek::find($id_aktivitas);
           $this->id_aktivitas = $id_aktivitas;
           $this->nama_aktivitas = $data->nama_aktivitas;
           $this->tgl_aktivitas = $data->tgl_aktivitas;
           $this->id_kegiatan = $data->id_kegiatan;
           $this->keterangan = $data->keterangan;
           $this->progress_kegiatan = $data->progress_kegiatan;
           $this->status=$data->status;
           $this->id_proyek = $data->kegiatanProyek->id_proyek;
           $this->getProyek();
        }
    }
    public function render()
    {
        $list_proyeks = Proyek::all();
        return view('livewire.aktivitas.aktivitas-create',compact('list_proyeks'));
    }
    public function getProyek(){
       $data =  Proyek::find($this->id_proyek);
       $this->alamat = $data->alamat_proyek;
       $this->list_kegiatan = KegiatanProyek::where('id_proyek',$this->id_proyek)->get();
    
    }
    public function getKegiatan(){
        $data =  KegiatanProyek::find($this->id_kegiatan);
        $this->progress_kegiatan = $data->progress_kegiatan;
        $this->progress_old = $data->progress_kegiatan;
    }
    public function store(){
        $this->validate([
            'id_proyek' => 'required',
            'id_kegiatan' => 'required',
            'nama_aktivitas' => 'required',
            'tgl_aktivitas' => 'required',
        ]);
        $aktivitas = AktivitasProyek::updateOrCreate(
            [
                'id_aktivitas' => $this->id_aktivitas 
            ],
            [
                'id_kegiatan' => $this->id_kegiatan,
                'nama_aktivitas' => $this->nama_aktivitas,
                'tgl_aktivitas' => $this->tgl_aktivitas,
                'status'=> $this->status,
                'progress_kegiatan' => $this->progress_kegiatan,
                'id_tukang' => $this->id_tukang,
                'keterangan' => $this->keterangan
            ]
        );
        $s = KegiatanProyek::where('id_kegiatan',$this->id_kegiatan)->first();
        if ($s) {
            $s->progress_kegiatan = $this->progress_kegiatan;
            $s->save();
        }

        $this->alertSuccess('Aktifitas Berhasil ditambahkan');

        return redirect()->route('aktivitas');
    }

    public function alertSuccess($message)
    {
        $this->dispatch(
            'alert',
            ['type' => 'success',  'message' => $message]
        );
    }
}
