<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
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

    public function rekening() {
        return $this -> hasMany(Rekening::class, "area_id");
    }

    public function master() {
        return $this -> hasMany(PengumumanMaster::class, "area_id");
    }

    public function pegawais() {
        return $this -> hasMany(PegawaiArea::class, 'area_id');
    }
}
