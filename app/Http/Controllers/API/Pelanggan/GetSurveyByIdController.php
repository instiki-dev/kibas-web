<?php

namespace App\Http\Controllers\API\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\SurveyMaster;
use Exception;
use Illuminate\Http\Request;

class GetSurveyByIdController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, SurveyMaster $survey)
    {
        try {
            $master = SurveyMaster::where('id', $survey -> id)
                -> with('detail') -> get();
            return response($master, 200);
        } catch(Exception $e) {
            return response([
                "status" => false,
                "message" => $e -> getMessage()
            ], 500);
        }
    }
}
