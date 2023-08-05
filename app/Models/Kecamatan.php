<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kecamatan extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        "kecamatan"
    ];

    public function areas() {
        return $this -> hasMany(Area::class, "kecamatan_id");
    }

    public function pelanggans() {
        return $this -> hasMany(Pelanggan::class, "kecamatan_id");
    }

    public function rekenings() {
        return $this -> hasMany(Rekening::class, "kecamatan_id");
    }
}
