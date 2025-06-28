<?php

namespace App\Livewire\Customer;

use App\Models\Client;
use App\Models\Customer;
use App\Models\PesananKendaraan;
use App\Models\Proyek;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerData extends Component
{
    use WithPagination;
    
    public $updateMode =false,$id_client,$nama_perusahaan,$nama_client,$no_npwp,$nik,$alamat,$deskripsi,$no_hp;
    public function render()
    {
        $data = Client::paginate(10);
        return view('livewire.customer.customer-data',compact('data'));
    }

    public function store()
    {
        $this->validate([
            'nama_perusahaan' => 'required',
            'nama_client' => 'required',    
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);
        // Save User 
        
       
        Client::updateOrCreate([
            'id_client' => $this->id_client
        ],[
            'nama_perusahaan' => $this->nama_perusahaan,
            'no_hp' => $this->no_hp,
            'alamat' => $this->alamat,
            'deskripsi' => $this->deskripsi,
            'nama_client' => $this->nama_client,
            'nik' => $this->nik,
            'no_npwp' => $this->no_npwp,
        ]);
        $this->resetInputFields();
        $this->alertSuccess('Data Client Berhasil diperbaharui');
        $this->dispatch('close-modal');
    }
    public function alertSuccess($message)
    {
        $this->dispatch(
            'alert',
            ['type' => 'success',  'message' => $message]
        );
    }

    private function resetInputFields()
    {
        $this->id_client = '';
        $this->nama_perusahaan = '';
        $this->no_hp = '';
        $this->alamat = '';
        $this->deskripsi = '';
        $this->nama_client="";
        $this->nik="";
    }
    public function edit($id)
    {
        $customer = Client::find($id);
        $this->id_client = $id;
        $this->nama_perusahaan = $customer->nama_perusahaan;
        $this->no_hp = $customer->no_hp;
        $this->deskripsi = $customer->deskripsi;
        $this->alamat = $customer->alamat;
        $this->nama_client = $customer->nama_client;
        $this->nik = $customer->nik;
        $this->no_npwp = $customer->no_npwp;
        $this->updateMode = true;
        $this->dispatch('show-modal');
    }
    public function delete($id){
    
        $pr = Proyek::where('id_client',$id)->count();
        if($pr == 0){
            $data = Client::find($id);

            $data->delete();
            $this->dispatch(
                'alert',
                ['type' => 'success',  'message' => 'Data Client Berhasil dihapus']
            );
        }else{
            $this->dispatch(
                'alert',
                ['type' => 'success',  'message' => 'Data client tidak dapat dihapus karena terkait dengan Proyek']
            );
        }
    }
}
