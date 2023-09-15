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

    public function area() {
        return $this -> belongsTo(Area::class, "area_id");
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

    public function pengumuman() {
        $master = PengumumanMaster::where('area_id', $this -> area_id) -> select('pengumuman', 'created_at') -> get() ;
        $detail = PengumumanDetail::where('rekening_id', $this -> id) -> select('id', 'master_id') -> with('master:id,pengumuman,created_at') -> get();
        $data = [];
        foreach($master as $item) {
            $dt["pengumuman"] = $item -> pengumuman;
            $dt["created_at"] = $item -> created_at;
            array_push($data, $dt);
        }

        foreach($detail as $item) {
            $dt["pengumuman"] = $item -> master -> pengumuman;
            $dt["created_at"] = $item -> master -> created_at;
            array_push($data, $dt);
        }

        return $data;
    }
}
