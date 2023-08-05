<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelurahan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "kelurahan"
    ];

    public function pelanggans() {
        return $this -> hasMany(Pelanggan::class, "kelurahan_id");
    }

    public function rekenings() {
        return $this -> hasMany(Rekening::class, "kelurahan_id");
    }
}
