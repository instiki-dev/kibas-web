<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PengumumanMaster extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ["pengumuman", "area_id", "jenis_id"];
}
