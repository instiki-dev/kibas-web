<?php

namespace App\Http\Controllers\Admin\Kecamatan;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class HapusKecamatanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Kecamatan $kecamatan)
    {
        Kecamatan::where("id", $kecamatan -> id) -> delete();
        return redirect() -> route('kecamatan') -> with("successMessage", "Data kecamatan telah terhapus");
    }
}
