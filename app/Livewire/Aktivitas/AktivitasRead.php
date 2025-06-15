<?php

namespace App\Livewire\Aktivitas;

use App\Models\AktivitasProyek;
use Livewire\Component;
use Livewire\WithPagination;

class AktivitasRead extends Component
{
    use WithPagination;
    public function render()
    {
        $data = AktivitasProyek::latest()->paginate(10);
        return view('livewire.aktivitas.aktivitas-read',compact('data'));
    }
    public function delete($id){
      
        $data = AktivitasProyek::find($id);
        if($data){
            $data->delete();
        }
        $this->alertSuccess('Data Aktifitas Berhasil dihapus');
    }
}
