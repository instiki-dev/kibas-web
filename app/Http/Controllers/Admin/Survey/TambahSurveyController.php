<?php

namespace App\Http\Controllers\Admin\Survey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TambahSurveyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // return view('admin.tambahsurvey');
        return view('adminlte.tambahsurvey');
    }
}
