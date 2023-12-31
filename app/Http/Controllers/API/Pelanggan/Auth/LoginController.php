<?php

namespace App\Http\Controllers\API\Pelanggan\Auth;

use App\Http\Controllers\Controller;
use App\Models\Rekening;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Nette\Schema\ValidationException;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getTagihan(String $noRekening) {
        return Http::withHeaders([
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoibGF5YW5hbnBlbCIsInBhc3MiOiIwMzhlM2U0YWQ3NDQ1M2E3MjE1M2ZiYmYzMmE2MDU3MyIsInRhbmdnYWwiOiIyMDIxLTAyLTA1IDEyOjQ3OjAwIn0.iSE4SGsAmnKh6E7tgf7rG4qjzYbmojY-jkhw0SFktmA',
                'Accept' => 'application/json'
            ])
            ->get('https://apikabbangli.limasakti.co.id/api/loket-datatagihan/'.$noRekening);
    }


    public function __invoke(Request $request)
    {
        try {
            $validateUser = Validator::make($request -> all(),
                [
                    "no_rekening" => "required",
                    "password" => "required",
                    "device_token" => "required"
                ]
            );

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validasi data login gagal',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $rekening = Rekening::where('no_rekening', $request -> no_rekening) -> first();
            if (!$rekening) {
                return response()->json([
                    'status' => false,
                    'message' => 'Rekening & Password tidak cocok',
                ], 401);
            }
            $user = $rekening -> pelanggan -> user;
            $credential = [
                "name" => $user -> name,
                "password" => $request -> password,
            ];

            if (!Auth::attempt($credential)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Rekening & Password tidak cocok',
                ], 401);
            }
            $deviceToken = ["device_token" => $request -> device_token];

            User::where('id', $user -> id) -> update($deviceToken);
            Rekening::where('id', $rekening -> id) -> update($deviceToken);

            return response()->json([
                'status' => true,
                'message' => 'Login berhasil',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
