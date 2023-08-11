<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\PengumumanMaster;
use App\Models\SurveyMaster;
use Carbon\Carbon;
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
        // $berita = Berita::orderBy('created_at', 'DESC') -> get();
        $survey = SurveyMaster::all();
        $month = Carbon::now() -> subDays(30) ->toDateString();
        $pengumuman = PengumumanMaster::whereNotNull('area_id') -> where('created_at', '>', $month) -> get() -> unique('created_at');
        return view('adminlte.dashboard', [
            "survey" => $survey,
            "pengumuman" => $pengumuman
        ]);
    }
}
