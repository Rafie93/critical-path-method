<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuplaiBahan extends Model
{
    use HasFactory;

    protected $table = 'suplai_bahan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_tukang',
        'tanggal',
        'id_kegiatan',
        'id_bahan',
        'jumlah',
        'status',
        'keterangan'
    ];

    public function tukang()
    {
        return $this->belongsTo(Tukang::class, 'id_tukang');
    }

    public function bahanMaterial()
    {
        return $this->belongsTo(BahanMaterial::class, 'id_bahan');
    }

    public function kegiatanProyek()
    {
        return $this->belongsTo(KegiatanProyek::class, 'id_kegiatan');
    }
    public function statusDisplay(){
        if($this->status==0){
            return 'Draft';
        }else if($this->status==1){
            return 'Pengajuan';
        }else if($this->status==2){
            return 'Disetujui';
        }else if($this->status==9){
            return 'Ditolak';
        }
        return '-';
    }
}