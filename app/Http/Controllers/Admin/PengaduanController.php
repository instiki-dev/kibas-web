<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

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
        $pengaduan = Pengaduan::where('status', '1') -> orderBy('created_at', 'ASC') -> get();
        // return view('admin.pengaduan', ["data" => $pengaduan]);
        return view('adminlte.pengaduan', ["data" => $pengaduan]);
    }
}
