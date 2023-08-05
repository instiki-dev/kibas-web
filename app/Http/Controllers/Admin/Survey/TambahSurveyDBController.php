<?php

namespace App\Http\Controllers\Admin\Survey;

use App\Http\Controllers\Controller;
use App\Models\SurveyDetail;
use App\Models\SurveyMaster;
use Illuminate\Http\Request;

class TambahSurveyDBController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $validate = $request -> validate([
            "pertanyaan" => "required"
        ]);

        $master = SurveyMaster::create($validate);

        $iterate = (count($request -> all()) - 2)/2;


        for ($i = 0; $i < $iterate; $i++) {
            $data = [
                "pertanyaan_id" => $master -> id,
                "keterangan" => $request["detail".(string)($i+1)],
                "bobot" => $request["bobot".(string)($i+1)],
            ];

            SurveyDetail::create($data);
        }
        return redirect() -> route('dashboard') -> with('successMessage', 'Berhasil menambahkan sebuah survey');
    }
}
