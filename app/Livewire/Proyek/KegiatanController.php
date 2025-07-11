<?php

namespace App\Livewire\Proyek;

use App\Models\KegiatanProyek;
use App\Models\Proyek;
use Livewire\Component;

class KegiatanController extends Component
{
    public $proyek,$updateMode=false,$selected_id,$type=1,
    $kode_kegiatan,$nama_kegiatan,$kegiatan_sebelum=[],$durasi=1,$status_kegiatan="Start",$progress_kegiatan=0;
    public function mount($id){
        $this->proyek = Proyek::find($id);
    }
    public function render()
    {
        return view('livewire.proyek.kegiatan-controller');
    }
    public function clickType($id){
        $this->type = $id;
    }
    public function store(){
        $this->validate([
            'kode_kegiatan' => 'required',
            'nama_kegiatan' => 'required',
            'durasi' => 'required|numeric',
            'progress_kegiatan' => 'required|numeric|min:0|max:100'
        ]);
        if (!$this->selected_id) {
           $sama= KegiatanProyek::where('id_proyek',$this->proyek->id_proyek)
                            ->where('kode_kegiatan',$this->kode_kegiatan)
                            ->count();
            if ($sama) {
                $this->alertWarning('Kode Kegiatan Pada Proyek ini tidak boleh sama');
                return;
            }
            $sama2= KegiatanProyek::where('id_proyek',$this->proyek->id_proyek)
                            ->where('nama_kegiatan',$this->nama_kegiatan)
                            ->count();
            if ($sama2) {
                $this->alertWarning('Nama Kegiatan Pada Proyek ini tidak boleh sama');
                return;
            }
        }
       KegiatanProyek::updateOrCreate([
            'id_kegiatan' => $this->selected_id
        ],[
            'kode_kegiatan' => $this->kode_kegiatan,
            'nama_kegiatan' => $this->nama_kegiatan,
            'kegiatan_sebelum' =>implode(',', $this->kegiatan_sebelum),
            'durasi' => $this->durasi,
            'progress_kegiatan' => $this->progress_kegiatan,
            'status_kegiatan' => $this->status_kegiatan,
            'id_proyek' => $this->proyek->id_proyek
        ]);
        // 
        $progress = KegiatanProyek::where('id_proyek',$this->proyek->id_proyek)->sum('progress_kegiatan');
        if ($progress >0) {
            $progress_all = $progress / KegiatanProyek::where('id_proyek',$this->proyek->id_proyek)->count();
            $this->proyek->progress_proyek = $progress_all;
            $this->proyek->save();
        }
        $this->resetInputFields();
        $this->alertSuccess('Data Kegiatan Proyek Berhasil Ditambahkan');
        $this->dispatch('close-modal');
    }
    public function alertSuccess($message)
    {
        $this->dispatch(
            'alert',
            ['type' => 'success',  'message' => $message]
        );
    }
    public function alertWarning($message)
    {
        $this->dispatch(
            'alert',
            ['type' => 'warning',  'message' => $message]
        );
    }

    private function resetInputFields()
    {
        $this->nama_kegiatan = '';
        $this->kode_kegiatan = '';
        $this->kegiatan_sebelum = [];
        $this->durasi = 1;
        $this->progress_kegiatan = 0;
    }
    public function edit($id)
    {
        $kegiatan = KegiatanProyek::find($id);
        $this->selected_id = $id;
        $this->kode_kegiatan = $kegiatan->kode_kegiatan;
        $this->nama_kegiatan = $kegiatan->nama_kegiatan;
        $this->durasi = $kegiatan->durasi;
        $this->progress_kegiatan = $kegiatan->progress_kegiatan;
        $this->kegiatan_sebelum = explode(',',  $kegiatan->kegiatan_sebelum);
        $this->dispatch('show-modal');
    }
    public function delete($id){
        $data = KegiatanProyek::find($id);
        if($data){
            $data->delete();
        }
        $this->alertSuccess('Data Kegiatan Berhasil dihapus');
    }
}
