<?php

namespace App\Http\Controllers\Admin\Area;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class TambahAreaController extends Controller
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
            "area" => "required",
            "kecamatan_id" => "required"
        ]);
        $validate["kecamatan_id"] = $validate["kecamatan_id"] != "0"
            ? (int)$validate["kecamatan_id"] : null;
        Area::create($validate);
        return redirect() -> route('area') -> with("successMessage", "Berhasil menambah data");
    }
}
