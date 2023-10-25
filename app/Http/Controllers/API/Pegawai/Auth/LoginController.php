<?php

namespace App\Http\Controllers\API\Pegawai\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Rekening;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        try {
            $validateUser = Validator::make($request -> all(),
                [
                    "username" => "required",
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

            $credential = [
                "name" => $request -> username,
                "password" => $request -> password
            ];

            if (!Auth::attempt($credential)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Username & password tidak cocok',
                ], 401);
            }

            $user = User::where("name", $credential["name"]) -> first();
            $roles = $user -> roles -> first() -> name;

            if ($roles != 'Pembaca Meter') {
                return response()->json([
                    'status' => false,
                    'message' => 'Username & password tidak cocok',
                ], 401);
            }

            $deviceToken = ["device_token" => $request -> device_token];

            User::where('id', $user -> id) -> update($deviceToken);

            $pegawai = Pegawai::where('user_id', $user -> id) -> first();

            return response()->json([
                'status' => true,
                'message' => 'Login berhasil',
                'detail_pegawai' => $pegawai,
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
