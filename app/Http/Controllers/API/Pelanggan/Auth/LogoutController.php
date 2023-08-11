<?php

namespace App\Http\Controllers\API\Pelanggan\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = ["device_token" => null];
        User::where('id', auth('sanctum') -> user() -> id) -> update($data);
        auth('sanctum') -> user() -> tokens() -> delete();
        return response(["message" => "Berhasil logout"], 200);
    }
}
