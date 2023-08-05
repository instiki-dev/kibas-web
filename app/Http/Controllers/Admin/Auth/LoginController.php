<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $validated = $request -> validate([
            "name" => "required",
            "password" => "required"
        ]);


        // $user = User::where('name', $validated["name"]) -> first();

        // if (!$user || !Hash::check($validated["password"], $user -> password)) {
        //     return back() -> withErrors("Login Gagal");
        // }
        //

        if(Auth::attempt($validated)) {
            $request -> session() -> regenerate();
            return redirect() -> route('dashboard');
        }

        return back() -> withErrors("Gagal melakukan login");
    }
}
