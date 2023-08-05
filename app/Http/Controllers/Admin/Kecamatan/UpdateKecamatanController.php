<?php

namespace App\Http\Controllers\Admin\Kecamatan;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class UpdateKecamatanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Kecamatan $kecamatan)
    {
        $validate = $request -> validate([
            "kecamatan" => "required"
        ]);
        Kecamatan::where('id', $kecamatan -> id) -> update($validate);
        return redirect() -> route('kecamatan') -> with("successMessage", "Berhasil merubah data");
    }
}
