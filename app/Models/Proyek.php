<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $table = 'proyek';
    protected $primaryKey = 'id_proyek';
    protected $fillable = [
        'nama_proyek',
        'id_client',
        'alamat_proyek',
        'foto_rancangan',
        'deskripsi_proyek',
        'tgl_mulai',
        'batas_waktu',
        'batas_waktu_terbaru',
        'status_proyek',
        'progress_proyek',
        'arsip_proyek',
        'id_user'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kegiatanProyek()
    {
        return $this->hasMany(KegiatanProyek::class, 'id_proyek');
    }
    public function jadwal()
    {
       return Jadwal::whereHas('kegiatan', function ($query) {
            return $query->where('IDUser', '=', 1);
        })->get();
    }
   
    public function display_kegiatan(){
        $d = $this->hasMany(KegiatanProyek::class, 'id_proyek');
        if($d->count()>0){
            return $d->count(). ' Kegiatan';
        }else{
            return 'Belum Ada Kegiatan';
        }
    }
}