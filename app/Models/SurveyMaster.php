<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyMaster extends Model
{
    use HasFactory;

    protected $fillable = ["pertanyaan"];

    public function detail() {
        return $this -> hasMany(SurveyDetail::class, "pertanyaan_id", "id");
    }

    public function jawaban() {
        return $this -> hasMany(SurveyJawaban::class, "pertanyaan_id", "id");
    }
}
