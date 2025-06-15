<?php

namespace App\Livewire\Proyek;

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

    
}
