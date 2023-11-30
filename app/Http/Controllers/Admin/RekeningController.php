<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use App\Models\Rayon;
use App\Models\Rekening;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RekeningController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // $rekening = Rekening::all();
        // return view('admin.rekening', ["data" => $rekening]);
        // return view('adminlte.rekening', ["data" => $rekening]);
        //

        // $data = Rekening::orderBy('id', 'ASC')
        //         -> with('pelanggan:id,nama_pelanggan')
        //         -> select('id', 'no_rekening', 'pelanggan_id')
        //         -> get();
        // dd($data[0]);
        //

        $golongan = Golongan::all();
        $rayon = Rayon::all();
        if($request -> ajax()) {
            $data = Rekening::orderBy('id', 'ASC')
                    -> with('pelanggan:id,nama_pelanggan')
                    -> select('id', 'no_rekening', 'pelanggan_id')
                    -> get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function($row){
                    $edit = route('show-update-rekening', ['rekening' => $row -> id]);
                    $hapus = route('hapus-rekening', ['rekening' => $row -> id]);
                    $detail = route('show-detail-rekening', ['rekening' => $row -> id]);
                    $actionBtn = '
                    <a href="'.$edit.'" class="edit btn btn-outline-success btn-sm">Edit <i class="fa fa-pen" aria-hidden="true"></i></a> 
                    <a href="'.$detail.'" class="edit btn btn-outline-info btn-sm">Detail <i class="fa fa-info-circle" aria-hidden="true"></i></a> 
                    <a href="'.$hapus.'" onclick="return confirm('."'Yakin ingin menhapus data?'".')" class="delete btn btn-outline-danger btn-sm">Hapus <i class="fa fa-trash" aria-hidden="true"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('adminlte.rekening', [
            'golongan' => $golongan,
            'rayon' => $rayon
        ]);
    }
}
