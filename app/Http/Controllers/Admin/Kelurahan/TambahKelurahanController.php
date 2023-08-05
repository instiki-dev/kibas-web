<?php

namespace App\Http\Controllers\Admin\Kelurahan;

use App\Http\Controllers\Controller;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class TambahKelurahanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $validate = $request -> validate([
            "kelurahan" => "required"
        ]);

        Kelurahan::create($validate);
        return redirect() -> route('kelurahan') -> with("successMessage", "Kelurahan berhasil ditambahkan");
    }
}
