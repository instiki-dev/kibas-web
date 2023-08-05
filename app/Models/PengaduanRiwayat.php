<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaduanRiwayat extends Model
{
    use HasFactory;
    protected $guarded = [
        "id",
        "created_at",
        "updated_at",
    ];

    public function pembuat() {
        return $this -> belongsTo(Pelanggan::class, "created_by");
    }

    public function pengaduan() {
        return $this -> belongsTo(Pengaduan::class, "pengaduan_id");
    }


}
