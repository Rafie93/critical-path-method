<?php

namespace App\Livewire\Proyek;

use App\Models\Client;
use App\Models\Proyek;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProyekCreate extends Component
{
    use WithFileUploads;

    public $proyek_id;
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
    
    public function mount($id=null){
        $this->id_user = auth()->user()->id;
        if ($id) {
            $this->proyek_id=$id;
            $proyek = Proyek::find($id);
            $this->id_user = $proyek->id_user;
            $this->nama_proyek = $proyek->nama_proyek;
            $this->id_client = $proyek->id_client;
            $this->alamat_proyek = $proyek->alamat_proyek;
            $this->deskripsi_proyek = $proyek->deskripsi_proyek;
            $this->tgl_mulai = $proyek->tgl_mulai;
            $this->batas_waktu = $proyek->batas_waktu;
            $this->status_proyek= $proyek->status_proyek;
            $this->progress_proyek = $proyek->progress_proyek;
            // $this->arsip_proyek = $proyek->arsip_proyek;
        }
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
        Proyek::updateOrCreate(['id_proyek'=>$this->proyek_id],$this->all());
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
