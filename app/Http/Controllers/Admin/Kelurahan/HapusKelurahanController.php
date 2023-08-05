<?php

namespace App\Http\Controllers\Admin\Kelurahan;

use App\Http\Controllers\Controller;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class HapusKelurahanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Kelurahan $kelurahan)
    {
        Kelurahan::where("id", $kelurahan -> id) -> delete();
        return redirect() -> route('kelurahan') -> with("successMessage", "Data kelurahan telah terhapus");
    }
}
