<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PengaduanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // $month = Carbon::now() -> subDays(30) ->toDateString();
        // $pengaduan = Pengaduan::where('created_at', '>', $month) -> get();
        // return view('adminlte.pengaduan', ["data" => $pengaduan]);

        if($request -> ajax()) {
            $data = Pengaduan::select('id', 'rekening_id', 'petugas_id', 'created_at', 'status') -> orderBy('status', 'ASC') -> get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function($row){
                    $detail = route('show-detail-pengaduan', ['pengaduan' => $row -> id]);
                    $actionBtn = '<a href="'.$detail.'" class="edit btn btn-info btn-sm">Detail</a>';
                    return $actionBtn;
                })
                ->editColumn('rekening_id', function($row){
                    return $row -> rekening -> no_rekening;
                })
                ->editColumn('petugas_id', function($row){
                    return $row -> petugas ? $row -> petugas -> nama : "-";
                })
                ->editColumn('created_at', function($data){
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s',
                        $data->created_at)->format('d-m-Y');
                    return $formatedDate; })
                ->editColumn('status', function($row){
                    switch($row -> status) {
                        case 1 :
                            return '<span class="badge badge-secondary">Belum Dikonfirmasi</span>';
                            break;
                        case 2 :
                            return '<span class="badge badge-warning">Menunggu</span>';
                            break;
                        case 3 :
                            return '<span class="badge badge-info">Diproses</span>';
                            break;
                        default :
                            return '<span class="badge badge-success">Selesai</span>';
                            break;
                    }
                })
                ->rawColumns(['aksi', 'status'])
                ->make(true);
        }
        return view('adminlte.pengaduan');
    }
}
