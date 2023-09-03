<?php

namespace App\Http\Controllers\Admin\Rekening;

use App\Http\Controllers\Controller;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class KonfirmasiTagihanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Tagihan $tagihan)
    {
        $data = ["status" => 1];
        Tagihan::where('id', $tagihan -> id) -> update($data);
        return redirect() -> route('tagihan') -> with('successMessage', 'Berhasil mengkonfirmasi tagihan');
    }
}
