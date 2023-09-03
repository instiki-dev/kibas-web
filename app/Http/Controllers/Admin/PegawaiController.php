<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PegawaiController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // $data = Pegawai::all();
        // // return view('admin.pegawai', ["data" => $data]);
        // return view('adminlte.pegawai', ["data" => $data]);

        if($request -> ajax()) {
            $data = Pegawai::select('id', 'nama', 'jabatan', 'area_id') -> get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function($row){
                    $edit = route('show-update-pegawai', ['pegawai' => $row -> id]);
                    $hapus = route('hapus-pegawai', ['pegawai' => $row -> id]);
                    $actionBtn = '<a href="'.$edit.'" class="edit btn btn-success btn-sm">Edit</a> <a href="'.$hapus.'" onclick="return confirm('."'Yakin ingin menhapus data?'".')" class="delete btn btn-danger btn-sm">Hapus</a>';
                    return $actionBtn;
                })
                ->editColumn('area_id', function($row){
                    return $row -> area ? $row -> area -> area : "-";
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        // return view('adminlte.pelanggan', ["data" => $data]);
        return view('adminlte.pegawai');
    }
}
