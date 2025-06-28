<?php

namespace App\Livewire\Master;

use App\Models\BahanMaterial;
use App\Models\Mobil;
use App\Models\SuplaiBahan;
use App\Models\Tipe;
use Livewire\Component;

class BahanMaterialController extends Component
{
    public $openForm = false,$bahan_id,$nama_bahan,$ukuran,$merk,$harga=0,$kategori,$satuan;
    public function render()
    {
        $data = BahanMaterial::paginate(10);
        return view('livewire.master.bahan-controller',compact('data'));
    }

    public function showForm($id){
        $this->openForm = true;
        $this->bahan_id=$id;
        $edit = BahanMaterial::find($id);
        $this->nama_bahan = $edit->nama_bahan;
        $this->merk = $edit->merk;
        $this->ukuran=$edit->ukuran;
        $this->harga=$edit->harga;
        $this->kategori=$edit->kategori;
        $this->satuan =$edit->satuan;
        $this->dispatch('show-modal');
    }

    public function store(){
        $this->validate([
            'nama_bahan' => 'required',
            'kategori' => 'required',
        ]);
        BahanMaterial::updateOrCreate([
            'id_bahan' => $this->bahan_id
        ],[
            'nama_bahan' => $this->nama_bahan,
            'kategori' => $this->kategori,
            'merk' => $this->merk,
            'ukuran' => $this->ukuran,
            'harga' => $this->harga,
            'satuan' => $this->satuan
        ]);
        $this->alertSuccess('Data Bahan Material Berhasil diperbaharui');
        $this->nama_bahan = "";
        $this->bahan_id = "";
        $this->kategori="";
        $this->merk="";
        $this->ukuran="";
        $this->harga=0;
        $this->openForm=false;
        $this->dispatch('close-modal');
    }

    public function delete($id){
        $count = SuplaiBahan::where('id_bahan',$id)->count();
        if ($count > 0) {
            $this->dispatch(
                'alert',
                ['type' => 'warning',  'message' => "Data Tidak dapat dihapus terkait pada Suplai"]
            );
            return;
        }
        $data = BahanMaterial::find($id);
        if($data){
            $data->delete();
        }
        $this->alertSuccess('Bahan Material Berhasil dihapus');
    }

    public function alertSuccess($message)
    {
        $this->dispatch(
            'alert',
            ['type' => 'success',  'message' => $message]
        );
    }
}
