<?php

namespace App\Livewire\Proyek;

use App\Models\Client;
use App\Models\Proyek;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProyekCreate extends Component
{
    use WithFileUploads;
    public $nama_proyek;
    public $id_client;
    public $alamat_proyek;
    public $foto_rancangan;
    public $deskripsi_proyek;
    public $tgl_mulai;
    public $batas_waktu;
    public $batas_waktu_terbaru;
    public $status_proyek;
    public $progress_proyek;
    public $arsip_proyek;
    public $id_user;
    
    public function mount(){
        $this->id_user = auth()->user()->id;
    }
    public function render()
    {
        $clients = Client::all();
        
        return view('livewire.proyek.proyek-create',compact('clients'));
    }
    public function store(){
        $this->validate([
            'nama_proyek' => 'required',
            'id_client' => 'required',
            'alamat_proyek' => 'required',
            'deskripsi_proyek' => 'required',
            'tgl_mulai' => 'required',
            'status_proyek' => 'required',
            'id_user' => 'required',
        ]);
        Proyek::create($this->all());
        if($this->foto_rancangan){
            $this->foto_rancangan->store('images/rancangan');
        }
        if($this->arsip_proyek){
            $this->arsip_proyek->store('pdf/proyek');
        }
        $this->alertSuccess('Data Berhasil ditambahkan');
        return redirect()->route('proyek');
    }

    public function alertSuccess($message)
    {
        $this->dispatch(
            'alert',
            ['type' => 'success',  'message' => $message]
        );
    }

}
