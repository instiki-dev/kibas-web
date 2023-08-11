<?php

namespace App\Http\Controllers\API\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\Rekening;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterPelangganController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "no_rekening" => "required",
                "no_pelanggan" => "required",
                "nama_pelanggan" => "required",
                "nik_pelanggan" => "required",
                "username" => "required",
                "email" => "required|email",
                "password" => "required|min:7"
            ]);

            if ($validator -> fails()) {
                return response([
                    "status" => false,
                    "message" => $validator->errors()
                ], 400);
            }

            $rekening = Rekening::where([
                ['no_rekening', $request -> no_rekening],
                ['register', false],
            ]) -> first();

            if(!$rekening) {
                return response([
                    "status" => false,
                    "message" => "Gagal melakukan registrasi karena no rekening tidak tersedia atau sudah telah teregistrasi sebelumnya"
                ], 400);
            }

            Rekening::where([
                ['no_rekening', $request -> no_rekening],
                ['register', false],
            ]) -> update(["register" => true]);

            $pelangganData = [
                "no_pelanggan" => $request -> no_pelanggan,
                "nik_pelanggan" => $request -> nik_pelanggan,
                "nama_pelanggan" => $request -> nama_pelanggan
            ];

            Pelanggan::where('id', $rekening -> pelanggan -> id) -> update($pelangganData);

            $password = bcrypt($request -> password);

            $userData = [
                "name" => $request -> username,
                "email" => $request -> email,
                "password" => $password
            ];
            User::where('id', $rekening -> pelanggan -> user -> id) -> update($userData);

            return response([
                "status" => true,
                "message" => "Berhasil melakukan registrasi"
            ], 200);
        }catch(Exception $e){
            return response([
                "status" => false,
                "message" => $e -> getMessage()
            ], 500);
        }
    }
}
