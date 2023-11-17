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
                -> with(['penugasan:petugas_id,jumlah', 'user:id,device_token'])
                -> get();

            if ($request -> query('area')) {
                $area = $request -> query('area');
                $area = (int)$area;
                $pegawai = Pegawai::where([
                    ['jabatan', 'Pembaca Meter'],
                    ['area_id', $area]
                ])
                -> with(['penugasan:petugas_id,jumlah', 'user:id,device_token'])
                -> get();

                if (count($pegawai) == 0) {
                    $pegawai = Pegawai::where('jabatan', 'Pembaca Meter')
                        -> with(['penugasan:petugas_id,jumlah', 'user:id,device_token'])
                        -> get();
                }
            }

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
