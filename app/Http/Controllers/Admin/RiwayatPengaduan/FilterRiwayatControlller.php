<?php

namespace App\Http\Controllers\Admin\RiwayatPengaduan;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\PengaduanRiwayat;
use App\Models\Rekening;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FilterRiwayatControlller extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Rekening $rekening)
    {
        $now = Carbon::now() -> toDateString();
        $week = Carbon::now() -> subDays(7) ->toDateString();
        $month = Carbon::now() -> subDays(30) ->toDateString();
        if ($request -> query('filter')) {
            $value = $request -> query('filter');
            $value = substr($value, 1, strlen($value) - 2);

            if ($value == '1') {
                $riwayat = PengaduanRiwayat::where('created_at', '>', $now);
            } else if($value == '2') {
                $riwayat = PengaduanRiwayat::where('created_at', '>', $week);
            } else if($value == '3') {
                $riwayat = PengaduanRiwayat::where('created_at', '>', $month);
            } else {
                $riwayat = PengaduanRiwayat::orderBy('created_at', 'DESC');
            }
            $riwayat -> with('pengaduan.rekening')
                    -> whereHas('pengaduan.rekening', function($q)use($rekening){
                        $q -> where('id', $rekening -> id);
                    });
            $riwayat = $riwayat -> get();
            return view('admin.filterriwayat', ["data" => $riwayat]);
        }
    }
}
