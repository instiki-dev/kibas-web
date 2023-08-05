<?php

namespace App\Http\Controllers\Admin\Rekening;

use App\Http\Controllers\Controller;
use App\Models\Rekening;
use Illuminate\Http\Request;

class UpdateRekeningController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Rekening $rekening)
    {
        $validatedData = [
            "pelanggan_id" => "required",
            "kelurahan_id" => "required",
            "kecamatan_id" => "required",
            "lat" => "required",
            "lng" => "required",
        ];
        if ($request -> no_rekening != $rekening -> no_rekening) {
            $validatedData["no_rekening"] = "required";
        }

        $validate = $request -> validate($validatedData);



        $validate["pelanggan_id"] = (int)$validate["pelanggan_id"];
        $validate["kelurahan_id"] = (int)$validate["kelurahan_id"];
        $validate["kecamatan_id"] = (int)$validate["kecamatan_id"];

        Rekening::where('id', $rekening -> id) -> update($validate);
        return redirect() -> route('rekening') -> with('successMessage', 'Berhasil merubah data');
    }
}
