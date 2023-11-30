<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // $data = User::all();
        // // return view('admin.user', ["data" => $data]);
        // return view('adminlte.user', ["data" => $data]);

        if($request -> ajax()) {
            $data = User::orderBy('id', 'ASC')
                -> select('id', 'name', 'email')
                -> with('pegawai:id,user_id,nama')
                -> get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('nama', function($row) {
                    if ($row -> pegawai) {
                        return $row -> pegawai -> nama;
                    } else {
                        return '-';
                    }
                })
                ->addColumn('aksi', function($row){
                    $edit = route('show-ubah-password', ['user' => $row -> id]);
                    $actionBtn = '<a href="'.$edit.'" class="edit btn btn-outline-success btn-sm">Edit <i class="fa fa-pen" aria-hidden="true"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['nama', 'aksi'])
                ->make(true);
        }
        return view('adminlte.user');
    }
}
