<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tukang extends Model
{
    use HasFactory;

    protected $table = 'tukang';
    protected $primaryKey = 'id_tukang';
    protected $fillable = [
        'id_user',
        'nama',
        'no_telp',
        'is_kepala',
        'alamat'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function suplaiBahan()
    {
        return $this->hasMany(SuplaiBahan::class, 'id_tukang');
    }

    public function aktivitasProyek()
    {
        return $this->hasMany(AktivitasProyek::class, 'id_tukang');
    }
}