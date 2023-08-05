<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelanggan extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [
        "id",
        "created_at",
        "updated_at",
    ];

    public function kecamatan() {
        return $this -> belongsTo(Kecamatan::class, "kecamatan_id");
    }

    public function user() {
        return $this -> belongsTo(User::class, "user_id");
    }

    public function kelurahan() {
        return $this -> belongsTo(Kelurahan::class, "kelurahan_id");
    }

    public function golongan() {
        return $this -> belongsTo(Golongan::class, "golongan_id");
    }

    public function rekening() {
        return $this -> hasMany(Rekening::class, "pelanggan_id");
    }

    public function pengaduans() {
        return $this -> hasMany(Pengaduan::class, "pelanggan_id");
    }

    public function tagihan() {
        return $this -> hasMany(Tagihan::class, "pelanggan_id");
    }

    public function pengaduanRiwayat() {
        return $this -> hasMany(PengaduanRiwayat::class, "created_by");
    }


}
