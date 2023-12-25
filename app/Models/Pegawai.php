<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [
        "id",
        "created_at",
        "updated_at",
    ];

    public function pengaduans() {
        return $this -> hasMany(Pengaduan::class, "petugas_id");
    }

    public function penugasan() {
        return $this -> hasOne(Penugasan::class, "petugas_id", "id");
    }

    public function tagihan() {
        return $this -> hasMany(Tagihan::class, "pembaca_id");
    }

    public function user() {
        return $this -> belongsTo(User::class, "user_id");
    }

    public function area() {
        return $this -> belongsTo(Area::class, "area_id");
    }

    public function areas() {
        return $this -> hasMany(PegawaiArea::class, "pegawai_id");
    }
}
