<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;
    protected $guarded = [
        "id",
        "created_at",
        "updated_at",
    ];

    public function pelanggan() {
        return $this -> belongsTo(Pelanggan::class, "pelanggan_id");
    }

    public function pembaca() {
        return $this -> belongsTo(Pegawai::class, "pembaca_id");
    }

    public function rekening() {
        return $this -> belongsTo(Rekening::class, "rekening_id");
    }
}
