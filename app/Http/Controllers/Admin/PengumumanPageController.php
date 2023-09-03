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
            return DataTables::of($data)
                ->addIndexColumn()
                ->escapeColumns([])
                ->editColumn('created_at', function($data){
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s',
                        $data->created_at)->format('d-m-Y');
                    return $formatedDate; })
                ->make(true);
        }
        return view('adminlte.pengumumanpage');
    }
}
