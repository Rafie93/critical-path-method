<?php

namespace App\Livewire\Jadwal;

use App\Models\Jadwal;
use App\Models\KegiatanProyek;
use App\Models\Proyek;
use Livewire\Component;

class JadwalCreate extends Component
{
    public $id_proyek,$proyeksdata,$nama_client,$tanggal_mulai,$jumlah_item_kegiatan=0,
    $total_durasi_kegiatan=0,$free_float,$total_float,$result,$criticalPath,$total=0;
    public function render()
    {
        $proyeks = Proyek::all();
        return view('livewire.jadwal.jadwal-create',compact('proyeks'));
    }
    public function getProyek(){
        $d = Proyek::find($this->id_proyek);
        $this->proyeksdata = $d;
        $this->nama_client = $d->client->nama_client." | ". $d->client->nama_perusahaan;
        $this->tanggal_mulai = $d->tgl_mulai;
        $this->jumlah_item_kegiatan = $d->kegiatanProyek->count();
        $this->total_durasi_kegiatan = $d->kegiatanProyek->sum('durasi');

    }
    public function hitung(){
        $kegiatan= KegiatanProyek::orderBy('kode_kegiatan','asc')
                    ->where('id_proyek',$this->id_proyek)
                    ->get();
        $this->result = [];
        $no=1;
        foreach ($kegiatan as $key => $value) {
           $cpm = $this->calcualteCPM($value->id_kegiatan);
        //    $lslf =$this->hitungLsLf($value->id_kegiatan);
           Jadwal::updateOrCreate([
                'id_kegiatan' => $value->id_kegiatan,
           ],[
            'id_kegiatan' => $value->id_kegiatan,
            'durasi' => $value->durasi,
            'cepat_mulai' =>$cpm['es'],
            'cepat_selesai' => $cpm['ef'],
            'lambat_mulai' =>$cpm['ls'],
            'lambat_selesai' =>$cpm['ef'],
            'total_float' =>$cpm['total_float'],
            'free_float' => $cpm['free_float'],
           ]);
           $this->result[$key] = [
                'no' => $no++,
                'item' => $value->nama_kegiatan,
                'code' => $value->kode_kegiatan,
                'pendahulu' => $value->kegiatan_sebelum,
                'durasi' => $value->durasi,
                'es' => $cpm['es'],
                'ef' => $cpm['ef'],
                'ls' => $cpm['ls'],
                'lf' => $cpm['lf'],
                'float' =>$cpm['total_float'],
                'free' =>$cpm['free_float']
           ];
        }
        $this->criticalPath = $this->getCriticalPath($this->id_proyek);
        $this->alertSuccess('Proses Perhitungan selesai');

    }

    public function calcualteCPM($id_kegiatan)
    {
        // 1. Hitung ES dan EF (Forward Pass)
        $kegiatan = KegiatanProyek::find($id_kegiatan);
        $durasi = $kegiatan->durasi;
        
        // Hitung ES dan EF seperti sebelumnya
        $pendahulu = $kegiatan->kegiatan_sebelum;
        $es = 0;
        if ($pendahulu != null && $pendahulu != '-') {
            $awal = KegiatanProyek::where('id_proyek', $this->id_proyek)
                            ->whereIn('kode_kegiatan', explode(',', $pendahulu));
            $es = ($awal->count() > 0) ? $awal->max("ef") : 0;
        }
        $ef = $es + $durasi;
        
        // 2. Hitung LS dan LF (Backward Pass)
        $penerus = KegiatanProyek::where('id_proyek', $this->id_proyek)
                        ->where('kegiatan_sebelum', 'LIKE', '%' . $kegiatan->kode_kegiatan . '%')
                        ->get();
        
        $lf = $penerus->isEmpty() 
            ? $ef // Jika tidak ada penerus, LF = EF (kegiatan terakhir)
            : $penerus->min('ls'); // Ambil LS terkecil dari penerus
        
        $ls = $lf - $durasi;
        
        // 3. Hitung Float
        $total_float = $ls - $es; // atau $lf - $ef
        $free_float = $penerus->isEmpty() 
            ? 0 
            : max(0, $penerus->min('es') - $ef);
        
        // Simpan ke database
        $kegiatan->update([
            'es' => $es,
            'ef' => $ef,
            'ls' => $ls,
            'lf' => $lf,
            'total_float' => $total_float,
            'free_float' => $free_float
        ]);
        
        return [
            'es' => $es,
            'ef' => $ef,
            'ls' => $ls,
            'lf' => $lf,
            'total_float' => $total_float,
            'free_float' => $free_float
        ];
    }

    public function getCriticalPath($id_proyek)
    {
        // 1. Ambil semua kegiatan proyek yang sudah dihitung ES/EF/LS/LF
        $kegiatans = KegiatanProyek::where('id_proyek', $id_proyek)
            ->orderBy('ef', 'desc')
            ->get();

        // 2. Temukan kegiatan terakhir (dengan EF terbesar)
        $lastActivity = $kegiatans->first();
        $criticalPath = [$lastActivity->kode_kegiatan."(".$lastActivity->durasi.")"];
        $total = $lastActivity->durasi;
        // 3. Backtrack dari kegiatan terakhir ke awal
        $currentActivity = $lastActivity;
        while (true) {
            // Cari pendahulu dengan Total Float = 0 (kritis)
            $pendahulu = $this->findCriticalPredecessor($currentActivity, $kegiatans);
            
            if (!$pendahulu) break;
            $total += $pendahulu->durasi;
            array_unshift($criticalPath, $pendahulu->kode_kegiatan."(".$pendahulu->durasi.")");
            $currentActivity = $pendahulu;
        }
        $this->total = $total;
        // 4. Format output
        return implode(' → ', $criticalPath);
    }

    protected function findCriticalPredecessor($activity, $kegiatans)
    {
        if (empty($activity->kegiatan_sebelum) || $activity->kegiatan_sebelum == '-') {
            return null;
        }

        $kodePendahulu = explode(',', $activity->kegiatan_sebelum);
        
        foreach ($kodePendahulu as $kode) {
            $pendahulu = $kegiatans->firstWhere('kode_kegiatan', trim($kode));
            
            if ($pendahulu && $pendahulu->total_float == 0 && $pendahulu->ef == $activity->es) {
                return $pendahulu;
            }
        }

        return null;
    }


    public function alertSuccess($message)
    {
        $this->dispatch(
            'alert',
            ['type' => 'success',  'message' => $message]
        );
    }

}
