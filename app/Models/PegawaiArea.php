<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiArea extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pegawai() {
        return $this -> belongsTo(Pegawai::class, 'pegawai_id');
    }

    public function area() {
        return $this -> belongsTo(Area::class, 'area_id');
    }
}
