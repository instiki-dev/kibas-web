<?php

namespace App\Http\Controllers\API\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Rekening;
use App\Models\SurveyJawaban;
use App\Models\SurveyMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JawabSurveyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Rekening $rekening)
    {
        try {
            $validator = Validator::make($request -> all(), [
                "nilai" => "required|lte:6",
                "pertanyaan_id" => "required"
            ]);

            if($validator -> fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'format payload buruk',
                    'errors' => $validator->errors()
                ], 400);
            }

            $data = [
                "nilai" => $request -> nilai,
                "pertanyaan_id" => $request -> pertanyaan_id,
                "rekening_id" => $rekening -> id,
                "pelanggan_id" => $rekening -> pelanggan -> id
            ];

            SurveyJawaban::create($data);

            return response([
                "status" => true,
                "message" => "Jawaban telah terkirim"
            ], 200);
        } catch(\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
