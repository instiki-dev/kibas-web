<?php

namespace App\Http\Controllers\Admin\Survey;

use App\Http\Controllers\Controller;
use App\Models\SurveyMaster;
use Illuminate\Http\Request;

class DetailSurveyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, SurveyMaster $survey)
    {
        return view('adminlte.detailsurvey', ["data" => $survey]);
    }
}
