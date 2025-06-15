<?php

namespace App\Livewire\Jadwal;

use App\Models\Jadwal;
use Livewire\Component;
use Livewire\WithPagination;

class JadwalRead extends Component
{
    use WithPagination;
    public function render()
    {
        $data = Jadwal::paginate(10);
        return view('livewire.jadwal.jadwal-read',compact('data'));
    }
}
