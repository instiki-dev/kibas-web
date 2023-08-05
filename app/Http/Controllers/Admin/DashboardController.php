<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Pegawai;
use App\Models\SurveyMaster;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $admin = Pegawai::where('user_id', $request -> user() -> id) -> first();
        $arrNama = explode(' ', $admin -> nama);
        $size = count($arrNama);
        if ($size > 2) {
            $call = $arrNama[2];
        } else if ($size == 2) {
            $call = $arrNama[1];
        } else {
            $call = $arrNama[0];
        }
        $data = [
            "fullname" => $admin -> nama,
            "name" => $request -> user() -> name,
            "email" => $request -> user() -> email,
            "call" => $call
        ];

        // $berita = Berita::orderBy('created_at', 'DESC') -> get();
        // $survey = SurveyMaster::all();

        // return view('admin.profil', [
        //     "data" => $data,
        //     "berita" => $berita,
        //     "survey" => $survey
        // ]);

        return view('adminlte.profil', ["data" => $data]);
    }
}
