<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $guarded = [
        "id",
        "created_at",
        "updated_at",
    ];

    public function pelanggan() {
        return $this -> belongsTo(Pelanggan::class, "pelanggan_id");
    }

    public function rekening() {
        return $this -> belongsTo(Rekening::class, "rekening_id");
    }

    public function petugas() {
        return $this -> belongsTo(Pegawai::class, "petugas_id");
    }

    public function pengaduanRiwayat() {
        return $this -> hasMany(PengaduanRiwayat::class, "pengaduan_id");
    }

}
