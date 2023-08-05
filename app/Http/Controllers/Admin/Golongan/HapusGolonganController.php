<?php

namespace App\Http\Controllers\Admin\Golongan;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use Illuminate\Http\Request;

class HapusGolonganController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Golongan $golongan)
    {
        Golongan::where("id", $golongan -> id) -> delete();
        return redirect() -> route('golongan') -> with("successMessage", "Data golongan telah terhapus");
    }
}
