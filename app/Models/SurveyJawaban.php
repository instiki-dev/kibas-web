<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyJawaban extends Model
{
    use HasFactory;

    protected $guarded = ["id", "updated_at", "created_at"];

    public function master() {
        return $this -> belongsTo(SurveyMaster::class, "pertanyaan_id");
    }

    public function pelanggan() {
        return $this -> belongsTo(Pelanggan::class, "pelanggan_id");
    }

    public function rekening() {
        return $this -> belongsTo(Rekening::class, "rekening_id");
    }
}
