<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PengumumanMaster extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ["pengumuman", "area_id", "jenis_id", "judul", "penulis", "link_foto"];

    public function detail() {
        return $this -> hasMany(PengumumanDetail::class, "master_id");
    }

    public function jenis() {
        return $this -> belongsTo(JenisPengumuman::class, 'jenis_id');
    }
}
