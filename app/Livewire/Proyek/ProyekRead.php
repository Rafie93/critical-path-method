<?php

namespace App\Livewire\Proyek;

use App\Models\KegiatanProyek;
use App\Models\Proyek;
use Livewire\Component;
use Livewire\WithPagination;

class ProyekRead extends Component
{
    use WithPagination;
    
    public function render()
    {
        $data = Proyek::latest()->paginate(10);
        return view('livewire.proyek.proyek-read',compact('data'));
    }
    public function delete($id){
        $data = Proyek::find($id);
        // check kegiatan
        $keg = KegiatanProyek::where('id_proyek',$id)->count();
        if ($keg > 0) {
            $this->dispatch(
                'alert',
                ['type' => 'error',  'message' => 'Data tidak dapat dihapus karena terkait adanya kegiatan']
            );
        }else{
            $data->delete();
            $this->dispatch(
                'alert',
                ['type' => 'success',  'message' => 'Data Berhasil dihapus']
            );
        }
    }

    
}
