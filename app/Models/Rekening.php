<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rekening extends Model
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

    public function kelurahan() {
        return $this -> belongsTo(Kelurahan::class, "kelurahan_id");
    }

    public function pelanggan() {
        return $this -> belongsTo(Pelanggan::class, "pelanggan_id");
    }

    public function pengaduans() {
        return $this -> hasMany(Pengaduan::class, "rekening_id");
    }

    public function tagihan() {
        return $this -> hasMany(Tagihan::class, "rekening_id");
    }
}
