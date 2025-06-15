<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';
    protected $fillable = [
        'id_kegiatan',
        'durasi',
        'cepat_mulai',
        'cepat_selesai',
        'lambat_mulai',
        'lambat_selesai',
        'total_float',
        'free_float',
        'keterangan'
    ];

    public function kegiatan()
    {
        return $this->belongsTo(KegiatanProyek::class, 'id_kegiatan', 'id_kegiatan');
    }
}