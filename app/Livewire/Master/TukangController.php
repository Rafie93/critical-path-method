<?php

namespace App\Livewire\Master;

use App\Models\PesananKendaraan;
use App\Models\Sales;
use App\Models\SuplaiBahan;
use App\Models\Tukang;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class TukangController extends Component
{
    use WithPagination;
    public $updateMode =false;
    public $id_user;
    public $nama;
    public $no_telp;
    public $email;
    public $alamat;
    public $is_kepala=0;
    public $tukang_id;
    public $password;
    public function render()
    {
        $sales = Tukang::latest()->paginate(10);
        return view('livewire.master.tukang-controller',compact('sales'));
    }
    public function iskepala(){}

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'is_kepala' => 'required'
        ]);
        // Save User 
        if($this->is_kepala==1){
            $user = User::create([
                'name' => $this->nama,
                'email' => $this->email,
                'level' => 2,
                'password' =>bcrypt($this->password ? $this->password : 123456)
            ]);
            $this->id_user = $user->id;
        }
       
        Tukang::updateOrCreate([
            'id_tukang' => $this->tukang_id
        ],[
            'id_user' => $this->id_user,
            'nama' => $this->nama,
            'no_telp' => $this->no_telp,
            'email' => $this->email,
            'alamat' => $this->alamat,
            'is_kepala' => $this->is_kepala,
        ]);
        $this->resetInputFields();
        $this->alertSuccess('Data Tukang Berhasil Ditambahkan');
        $this->dispatch('close-modal');
        return redirect()->route('master.tukang');
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
        $this->id_user = '';
        $this->nama = '';
        $this->no_telp = '';
        $this->email = '';
        $this->alamat = '';
        $this->is_kepala = 0;
        $this->tukang_id = "";
    }
    public function edit($id)
    {
        $sales = Tukang::find($id);
        $this->tukang_id = $id;
        $this->id_user = $sales->id_user;
        $this->nama = $sales->nama;
        $this->no_telp = $sales->no_telp;
        $this->email = $sales->email;
        $this->alamat = $sales->alamat;
        $this->is_kepala = $sales->is_kepala;
        $this->updateMode = true;
        $this->dispatch('show-modal');
    }
    public function delete($id){
        $count = SuplaiBahan::where('id_tukang',$id)->count();
        if ($count > 0) {
            $this->dispatch(
                'alert',
                ['type' => 'warning',  'message' => "Data Tidak dapat dihapus terkait pada suplai bahan"]
            );
            return;
        }
        $data = Tukang::find($id);
        if($data){
            $idUser = $data->id_user;
            $data->delete();
            if($idUser){
                $user = User::find($idUser);
                if($user){
                    $user->delete();
                }
            }
        }
        $this->alertSuccess('Data Tukang Berhasil dihapus');
    }
}
