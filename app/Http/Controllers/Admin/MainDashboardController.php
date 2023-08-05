<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\SurveyMaster;
use Illuminate\Http\Request;

class MainDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $berita = Berita::orderBy('created_at', 'DESC') -> get();
        $survey = SurveyMaster::all();
        return view('adminlte.dashboard', [
            "berita" => $berita,
            "survey" => $survey
        ]);
    }
}
