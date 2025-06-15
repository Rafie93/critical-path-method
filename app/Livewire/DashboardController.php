<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\Customer;
use App\Models\Jadwal;
use App\Models\Mobil;
use App\Models\PesananKendaraan;
use App\Models\Proyek;
use App\Models\Sales;
use App\Models\Tukang;
use Livewire\Component;

class DashboardController extends Component
{
    public $title = "Dashboard";
    public $countSalesman=0,$countCustomer=0,$countProyek=0,$countJadwal=0;
    public function render()
    {
    
        $this->countSalesman = Tukang::count();
        $this->countCustomer= Client::count();
        $this->countProyek = Proyek::count();
        $this->countJadwal = Jadwal::count();
        return view('livewire.dashboard-controller');
    }
}
