<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Error;
use Illuminate\Http\Request;

class GetPegawaiController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        try {
            $pegawai = Pegawai::where('jabatan', 'Pembaca Meter')
                -> with('penugasan:petugas_id,jumlah')
                -> get();

            return response(
                $pegawai,
                200
            );
        } catch(Error $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
