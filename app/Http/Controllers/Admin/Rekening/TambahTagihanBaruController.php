<?php

namespace App\Http\Controllers\Admin\Rekening;

use App\Http\Controllers\Controller;
use App\Models\Rekening;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class TambahTagihanBaruController extends Controller
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
            "no_tagihan" => "required",
            "no_rekening" => "required|exists:rekenings,no_rekening",
            "bulan" => "required|gt:0|lt:13",
            "tahun" => "required|gt:1",
            "tgl_jatuh_tempo" => "required",
            "pembaca_id" => "required",
            "kilometer" => "required",
            "nominal" => "required"
        ]);

        $rekening = Rekening::where('no_rekening', $validate['no_rekening']) -> first();

        $data = [
            "no_tagihan" => $validate["no_tagihan"],
            "bulan" => (int)$validate["bulan"],
            "tahun" => (int)$validate["tahun"],
            "tgl_jatuh_tempo" => $validate["tgl_jatuh_tempo"],
            "pembaca_id" => (int)$validate["pembaca_id"],
            "kilometer" => (int)$validate["kilometer"],
            "nominal" => (int)$validate["nominal"],
            "pelanggan_id" => $rekening -> pelanggan -> id,
            "rekening_id" => $rekening -> id,
            "status" => 0
        ];

        Tagihan::create($data);
        return redirect() -> route('tagihan') -> with('successMessage', 'Berhasil menambah tagihan');
    }
}
