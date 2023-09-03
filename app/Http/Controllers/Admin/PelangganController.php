<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PelangganController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // if($request -> ajax()) {
        // }
        // $data = Pelanggan::paginate();
        // // return view('admin.pelanggan', ["data" => $data]);
        // return view('adminlte.pelanggan', ["data" => $data]);

        if($request -> ajax()) {
            $data = Pelanggan::select('id', 'nama_pelanggan', 'nik_pelanggan') -> get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function($row){
                    $edit = route('show-edit-pelanggan', ['pelanggan' => $row -> id]);
                    $hapus = route('hapus-pelanggan', ['pelanggan' => $row -> id]);
                    $detail = route('show-detail-pelanggan', ['pelanggan' => $row -> id]);
                    $actionBtn = '<a href="'.$edit.'" class="edit btn btn-success btn-sm">Edit</a> <a href="'.$detail.'" class="edit btn btn-info btn-sm">Detail</a> <a href="'.$hapus.'" onclick="return confirm('."'Yakin ingin menhapus data?'".')" class="delete btn btn-danger btn-sm">Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        // return view('adminlte.pelanggan', ["data" => $data]);
        return view('adminlte.pelanggan');
    }
}
