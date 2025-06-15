<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanProyek extends Model
{
    use HasFactory;

    protected $table = 'kegiatan_proyek';
    protected $primaryKey = 'id_kegiatan';
    protected $fillable = [
        'id_proyek',
        'nama_kegiatan',
        'kode_kegiatan',
        'kegiatan_sebelum',
        'durasi',
        'status_kegiatan',
        'progress_kegiatan',
        'es',
        'ef',
        'ls',
        'lf',
        'total_float',
        'free_float'
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'id_proyek');
    }

    public function suplaiBahan()
    {
        return $this->hasMany(SuplaiBahan::class, 'id_kegiatan');
    }

    public function aktivitasProyek()
    {
        return $this->hasMany(AktivitasProyek::class, 'id_kegiatan');
    }

    public function jadwal()
    {
        return $this->hasOne(Jadwal::class, 'id_kegatan');
    }
}