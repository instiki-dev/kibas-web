<?php

namespace App\Http\Controllers\Admin\Survey;

use App\Http\Controllers\Controller;
use App\Models\SurveyMaster;
use Illuminate\Http\Request;

class HapusSurveyDBController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, SurveyMaster $survey)
    {
        SurveyMaster::where('id', $survey -> id) -> delete();
        return redirect() -> route('dashboard') -> with('successMessage', 'Berhasil menghapus survey');
    }
}
