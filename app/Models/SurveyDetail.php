<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyDetail extends Model
{
    use HasFactory;
    protected $fillable = ["pertanyaan_id", "keterangan", "bobot"];

    public function master() {
        return $this -> belongsTo(SurveyMaster::class, "pertanyaan_id");
    }
}
