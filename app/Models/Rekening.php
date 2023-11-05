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
        $master = PengumumanMaster::where('area_id', $this -> area_id) -> orWhere('jenis_id', 5) -> select('pengumuman', 'jenis_id', 'created_at') -> get() ;
        $detail = PengumumanDetail::where('rekening_id', $this -> id) -> select('id', 'master_id') -> with('master:id,pengumuman,jenis_id,created_at') -> get();
        $data = [];
        foreach($master as $item) {
            $dt["pengumuman"] = $item -> pengumuman;
            $dt['jenis_id'] =  $item -> jenis_id;
            $dt["created_at"] = $item -> created_at;
            $dt["judul"] = null;
            $dt["penulis"] = null;
            $dt["link_foto"] = null;
            if ($item -> jenis_id == 5) {
                $dt["judul"] = $item -> judul;
                $dt["penulis"] = $item -> penulis;
                $dt["link_foto"] = $item -> link_foto;
            }
            array_push($data, $dt);
        }

        foreach($detail as $item) {
            $dt["pengumuman"] = $item -> master -> pengumuman;
            $dt['jenis_id'] = $item -> master -> jenis_id;
            $dt["created_at"] = $item -> master -> created_at;
            $dt["judul"] = null;
            $dt["penulis"] = null;
            $dt["link_foto"] = null;
            array_push($data, $dt);
        }

        krsort($data, 1);

        $n = count($data) > 10 ? 10 : count($data);

        $data = array_slice($data, 0, $n);

        return $data;
    }
}
