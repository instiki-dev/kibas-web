<?php

namespace App\Http\Controllers\API\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\BacaMeter;
use App\Models\Rekening;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostMeterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Rekening $rekening)
    {
        try {
            $bulan = (int)Carbon::now() -> format('m');
            $tahun = (int)Carbon::now() -> format('Y');
            if (!$request -> file('foto_meter')) {
                return response()->json([
                    'status' => false,
                    'message' => 'bukti tidak tersedia',
                ], 400);
            }
            $filename = $request -> file('foto_meter') -> store('public/pengaduan');
            $file = str_replace("public", "", 'storage'.$filename);
            $url = url($file);

            $data = [
                "no_rekening" => $rekening -> no_rekening,
                "bulan" => $bulan,
                "tahun" => $tahun,
                "link_foto" => $url,
            ];

            $value = BacaMeter::create($data);
            return response($value, 200);
        } catch (Exception $e) {
            return response([
                "status" => false,
                "message" => $e -> getMessage()
            ], 500);
        }
    }
}
