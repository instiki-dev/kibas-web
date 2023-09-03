<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TagihanPageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if($request -> ajax()) {
            $data = Tagihan::orderBy('status', 'ASC')
                // -> with(
                //     [
                //         'pelanggan_id:id,nama_pelanggan',
                //         'rekening_id:id,no_rekening',
                //     ]
                // )
                -> select('id', 'pelanggan_id', 'rekening_id', 'tgl_jatuh_tempo', 'nominal', 'status')
                -> get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('pelanggan_id', function($data){
                    return $data -> pelanggan -> nama_pelanggan;
                })
                ->editColumn('rekening_id', function($data){
                    return $data -> rekening -> no_rekening;
                })
                ->escapeColumns([])
                ->editColumn('status', function($data){
                    $false = '<span class="badge badge-warning">Belum Lunas</span>';
                    $true = '<span class="badge badge-success">Lunas</span>';
                    return $data -> status == 1 ? $true : $false;
                })
                ->addColumn('aksi', function($row){
                    $route = route('konfirmasi-tagihan', ["tagihan" => $row -> id]);
                    $msg = "'Yakin ingin konfirmasi pembayaran?'";
                    $button = '<a onclick="return confirm('.$msg.')" type="button" href="'.$route.'" class="btn btn-success">Konfirmasi Pembayaran</a>';
                    return $row -> status == 0 ? $button : "";
                })
                ->make(true);
        }
        return view('adminlte.tagihanpage');
    }
}
