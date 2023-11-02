<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BacaMeter;
use App\Models\Rekening;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BacaMeterMandiriController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        if($request-> ajax()) {
            $month = Carbon::now() -> subDays(30) ->toDateString();
            $meter = BacaMeter::where('created_at', '>', $month)
                -> select('id', 'no_rekening', 'bulan', 'tahun', 'angka_final', 'verifikasi')
                -> orderBy('angka', 'ASC')
                -> get();
            return DataTables::of($meter)
                ->addIndexColumn()
                ->addColumn('final', function($row) {
                    if ($row -> angka_final) {
                        return $row -> angka_final;
                    }
                    return '-';
                })
                ->addColumn('pelanggan', function($row) {
                    $rekening = $row -> no_rekening;
                    return Rekening::where('no_rekening', $rekening) -> first() -> pelanggan -> nama_pelanggan;
                })
                ->addColumn('status', function($row) {
                    if ($row -> verifikasi) {
                        return '<td scope="col"><span class="badge badge-success">Terverifikasi</span></td>';
                    }
                    return '<td scope="col"><span class="badge badge-info">Belum Terverifikasi</span></td>';
                })
                ->addColumn('aksi', function($row) {
                    if (!$row -> angka_final) {
                        $detail = route('show-tambah-angka', ['meter' => $row -> id]);
                        $button = '<a href="'.$detail.'" type="button" class="btn btn-outline-info mr-3">Konfirmasi Besaran Meter</a>';
                        return $button;
                    }
                    return;
                })
                ->rawColumns(['aksi', 'status'])
                ->make(true);
        }

        // $month = Carbon::now() -> subDays(30) ->toDateString();
        // $meter = BacaMeter::where('created_at', '>', $month) -> orderBy('angka', 'ASC') -> get();
        return view('adminlte.bacametermandiri');
    }
}
