<?php

namespace App\Http\Controllers\API\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Rekening;
use Illuminate\Http\Request;

class GetRekeningController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Rekening $rekening)
    {
        // Ini Comment
        $user = auth('sanctum') -> user();
        $data = [
            "id" => $rekening -> id,
            "no_rekening" => $rekening -> id,
            "kecamatan" => $rekening -> kecamatan,
            "kelurahan" => $rekening -> kelurahan,
            "pelanggan" => $user -> pelanggan,
            "lat" => $rekening -> lat,
            "lng" => $rekening -> lng,
            "created_at" => $rekening -> created_at,
            "updated_at" => $rekening -> updated_at,
        ];
        return response($data, 200);
    }
}
