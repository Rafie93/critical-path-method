<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktivitasProyek extends Model
{
    use HasFactory;

    protected $table = 'aktivitas_proyek';
    protected $primaryKey = 'id_aktivitas';
    protected $fillable = [
        'id_kegiatan',
        'nama_aktivitas',
        'tgl_aktivitas',
        'status',
        'progress_kegiatan',
        'id_tukang',
        'keterangan'
    ];

    public function kegiatanProyek()
    {
        return $this->belongsTo(KegiatanProyek::class, 'id_kegiatan');
    }

    public function tukang()
    {
        return $this->belongsTo(Tukang::class, 'id_tukang');
    }
}