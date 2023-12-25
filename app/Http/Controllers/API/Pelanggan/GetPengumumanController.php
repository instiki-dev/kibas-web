<?php

namespace App\Http\Controllers\API\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\PengumumanMaster;
use App\Models\Rekening;
use Exception;
use Illuminate\Http\Request;

class GetPengumumanController extends Controller
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

            // $pengumumanMaster = PengumumanMaster::orderBy('created_at', 'DESC') -> where('area_id', $rekening -> area_id) -> paginate();
            // $pengumumanMaster - PengumumanMaster::where()

            if ($request -> query('berita')) {
                $berita = PengumumanMaster::where('jenis_id', 5)
                    -> orderBy('created_at', 'DESC')
                    -> get();
                return response($berita, 200);
            }

            if ($request -> query('info')) {
                return response($rekening -> pengumumanInfo(), 200);
            }

            return response($rekening -> pengumuman(), 200);
        } catch(Exception $e) {
            return response([
                "status" => false,
                "message" => $e -> getMessage()
            ], 500);
        }
    }
}
