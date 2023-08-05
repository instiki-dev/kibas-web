<?php

namespace App\Http\Controllers\Admin\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class SearchPegawaiController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request -> query('pegawai')) {
            $value = $request -> query('pegawai');
            if (strlen($value) > 2) {
                $value = substr($value, 1, strlen($value) - 2);
                $pegawai = Pegawai::where('nama', 'LIKE', '%'.$value.'%') -> get();
            } else {
                $pegawai = Pegawai::all();
            }

        }
        return view('admin.searchpegawai', ["data" => $pegawai]);
    }
}
