<?php

namespace App\Http\Controllers\Admin\Golongan;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use Illuminate\Http\Request;

class TambahGolonganController extends Controller
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
            "golongan" => "required"
        ]);

        Golongan::create($validate);
        return redirect() -> route('golongan') -> with("successMessage", "Golongan berhasil ditambahkan");
    }
}
