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
                    $actionBtn = '
                    <a href="'.$edit.'" class="edit btn btn-outline-success btn-sm">Edit <i class="fa fa-pen" aria-hidden="true"></i></a> 
                    <a href="'.$detail.'" class="edit btn btn-outline-info btn-sm">Detail <i class="fa fa-info" aria-hidden="true"></i></a> 
                    <a href="'.$hapus.'" onclick="return confirm('."'Yakin ingin menhapus data?'".')" class="delete btn btn-outline-danger btn-sm">Hapus <i class="fa fa-trash" aria-hidden="true"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        // return view('adminlte.pelanggan', ["data" => $data]);
        return view('adminlte.pelanggan');
    }
}