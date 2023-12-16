<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengumumanMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;

class PengumumanPageController extends Controller
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
            $data = PengumumanMaster::orderBy('created_at', 'DESC') -> with('jenis') -> get();
            $datas = DataTables::of($data)
                ->addIndexColumn()
                ->escapeColumns([])
                ->editColumn('pengumuman', function($row) {
                    if ($row -> jenis_id == 5) {
                        return $row -> judul;
                    } else {
                        return $row -> pengumuman;
                    }
                })
                ->editColumn('created_at', function($data){
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s',
                        $data->created_at)->format('d-m-Y');
                    return $formatedDate; })
                ->addColumn('aksi', function($row){
                    if ($row -> jenis_id == 5) {
                        $detail = route('berita', ['berita' => $row -> id]);
                        $hapus = route("hapus-pengumuman", ["pengumuman" => $row -> id]);
                        $actionBtn = '
                            <a href="'.$detail.'" class="edit btn btn-outline-primary btn-sm">Detail <i class="fa fa-info" aria-hidden="true"></i></a> 
                            <a href="'.$hapus.'" onclick="return confirm('."'Yakin ingin menhapus data?'".')" class="delete btn btn-outline-danger btn-sm">Hapus <i class="fa fa-trash" aria-hidden="true"></i></a>';
                        return $actionBtn;
                    }
                })
                ->rawColumns(['pengumuman', 'aksi'])
                ->make(true);
            
            return $datas;
        }
        return view('adminlte.pengumumanpage');
    }
}
