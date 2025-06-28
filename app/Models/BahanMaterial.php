<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanMaterial extends Model
{
    use HasFactory;

    protected $table = 'bahan_material';
    protected $primaryKey = 'id_bahan';
    protected $fillable = [
        'nama_bahan',
        'merk',
        'ukuran',
        'harga',
        'kategori',
        'satuan'
    ];

    public function suplaiBahan()
    {
        return $this->hasMany(SuplaiBahan::class, 'id_bahan');
    }
}