<?php

namespace App\Livewire\Suplai;

use App\Models\SuplaiBahan;
use Livewire\Component;
use Livewire\WithPagination;

class SuplaiRead extends Component
{
    use WithPagination;
    public function render()
    {
        $data= SuplaiBahan::latest()->paginate(10);
        return view('livewire.suplai.suplai-read',compact('data'));
    }
}
