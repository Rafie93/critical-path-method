<?php

namespace App\Livewire\Laporan;

use App\Models\AktivitasProyek;
use App\Models\Jadwal;
use App\Models\KegiatanProyek;
use App\Models\Proyek;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Livewire\Component;

class LaporanRead extends Component
{
    public $type;
    public function render()
    {
        return view('livewire.laporan.laporan-read');
    }

    public function print(){
        if ($this->type=="pemakaian") {
           return redirect()->route(
            'laporan.pemakaian'  );
        }elseif ($this->type=="jadwal") {
            return redirect()->route(
                'laporan.jadwal.pdf');
        }elseif ($this->type=="proyek") {
            return redirect()->route(
                'laporan.proyek.pdf');
        }elseif ($this->type=="cpm") {
            return redirect()->route(
                'laporan.cpm.pdf');
        }if ($this->type=="aktivitas") {
            return redirect()->route(
                'laporan.aktivitas.pdf');
        }
    }

    function pdfjadwal(Request $request) {
        $now= date('Y');
        $bulan = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        $data = Proyek::orderBy('tgl_mulai','asc')
                ->whereYear('tgl_mulai',$now)->get();
        return view('livewire.laporan.pdf.laporan-jadwal',compact('data','bulan'));
    }
    function pdfpemakaian(Request $request) {
        
    }
    function pdfproyek(Request $request) {
        $now= date('Y');
        $proyek = Proyek::orderBy('tgl_mulai','asc')
                ->whereYear('tgl_mulai',$now)->first();
        $data = $proyek;
        $kegiatans = $proyek->kegiatanProyek->map(function ($kegiatan) use ($proyek) {
            $durasiMinggu = ceil($kegiatan->durasi / 7);
            // Hitung minggu aktif berdasarkan tanggal
            $mingguAktif = $this->hitungMingguAktif(
                $proyek->start_date,
                $kegiatan->start_date,
                $kegiatan->end_date,
                $durasiMinggu
            );
            
            return [
                'id' => $kegiatan->id,
                'nama' => $kegiatan->nama_kegiatan,
                'durasi_hari' => $kegiatan->durasi,
                'durasi_minggu' => $durasiMinggu,
                'start_date' => $kegiatan->start_date,
                'end_date' => $kegiatan->end_date,
                'minggu_aktif' => $mingguAktif
            ];
        });
        return view('livewire.laporan.pdf.laporan-proyek',compact('data','proyek','kegiatans'));
    }
    function pdfaktivitas(Request $request) {
        $now = date('Y');
        $data = Proyek::orderBy('tgl_mulai','asc')
                ->whereYear('tgl_mulai',$now)->get();

        return view('livewire.laporan.pdf.laporan-aktivitas',
        compact('data'));
    }
    function pdfcpm(Request $request) {
        $now = date('Y');
        $data = Proyek::orderBy('tgl_mulai','asc')
                ->whereYear('tgl_mulai',$now)->get();
        return view('livewire.laporan.pdf.laporan-cpm',
        compact('data'));
    }

    private function hitungMingguAktif($proyekStartDate, $kegiatanStartDate, $kegiatanEndDate, $durasiMinggu)
    {
        $mingguAktif = array_fill(1, 12, 0);
        
        // Jika tidak ada tanggal, gunakan durasi minggu saja
        if (!$proyekStartDate || !$kegiatanStartDate || !$kegiatanEndDate) {
            for ($i = 1; $i <= $durasiMinggu && $i <= 12; $i++) {
                $mingguAktif[$i] = 1;
            }
            return $mingguAktif;
        }
        
        $start = Carbon::parse($proyekStartDate);
        $kegiatanStart = Carbon::parse($kegiatanStartDate);
        $kegiatanEnd = Carbon::parse($kegiatanEndDate);
        
        // Hitung minggu relatif terhadap proyek
        $startWeek = $start->diffInWeeks($kegiatanStart) + 1;
        
        // Aktifkan minggu sesuai durasi
        for ($i = $startWeek; $i < ($startWeek + $durasiMinggu) && $i <= 12; $i++) {
            $mingguAktif[$i] = 1;
        }
        
        return $mingguAktif;
    }
}
