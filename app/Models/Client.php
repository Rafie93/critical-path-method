<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $primaryKey = 'id_client';
    protected $fillable = [
        'nama_perusahaan',
        'nama_client',
        'alamat',
        'no_hp',
        'nik',
        'deskripsi',
        'no_npwp'
    ];

    public function proyek()
    {
        return $this->hasMany(Proyek::class, 'id_client');
    }
}