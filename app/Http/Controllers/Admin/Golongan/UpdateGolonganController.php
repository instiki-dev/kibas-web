<?php

namespace App\Http\Controllers\Admin\Golongan;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use Illuminate\Http\Request;

class UpdateGolonganController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Golongan $golongan)
    {
        $validate = $request -> validate([
            "golongan" => "required"
        ]);

        Golongan::where("id", $golongan -> id) -> update($validate);
        return redirect() -> route('golongan') -> with("successMessage", "Berhasil merubah data");
    }
}
