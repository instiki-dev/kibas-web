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

    public function tagihan() {
        return $this -> hasMany(Tagihan::class, "pembaca_id");
    }

    public function user() {
        return $this -> belongsTo(User::class, "user_id");
    }
}
