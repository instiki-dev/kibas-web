<?php

namespace App\Http\Controllers\Admin\Kecamatan;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class TambahKecamatanController extends Controller
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
            "kecamatan" => "required"
        ]);

        Kecamatan::create($validate);
        return redirect() -> route('kecamatan') -> with("successMessage", "Kecamatan berhasil ditambahkan");
    }
}
