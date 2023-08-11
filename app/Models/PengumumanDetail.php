<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengumumanDetail extends Model
{
    use HasFactory;
    protected $fillable = ["master_id", "rekening_id"];
}
