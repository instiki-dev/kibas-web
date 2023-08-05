<?php

namespace App\Http\Controllers\Admin\Kelurahan;

use App\Http\Controllers\Controller;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class UpdateKelurahanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Kelurahan $kelurahan)
    {
        $validate = $request -> validate([
            "kelurahan" => "required"
        ]);
        Kelurahan::where('id', $kelurahan -> id) -> update($validate);
        return redirect() -> route('kelurahan') -> with("successMessage", "Berhasil merubah data");
    }
}
