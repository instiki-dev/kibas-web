<?php

namespace App\Http\Controllers\Admin\Rekening;

use App\Http\Controllers\Controller;
use App\Models\Rekening;
use Illuminate\Http\Request;

class TambahRekeningController extends Controller
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
            "no_rekening" => "required|unique:rekenings",
            "pelanggan_id" => "required",
            "kelurahan_id" => "required",
            "kecamatan_id" => "required",
            "lat" => "required",
            "lng" => "required",
        ]);

        $validate["pelanggan_id"] = (int)$validate["pelanggan_id"];
        $validate["kelurahan_id"] = (int)$validate["kelurahan_id"];
        $validate["kecamatan_id"] = (int)$validate["kecamatan_id"];

        Rekening::create($validate);
        return redirect() -> route('rekening') -> with('successMessage', 'Berhasil menambah data rekening');
    }
}
