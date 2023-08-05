<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, User $user)
    {
        $validate = $request -> validate([
            "password" => "required",
            "password2" => "required|same:password"
        ]);

        $userData["password"] = bcrypt($validate["password"]);

        User::where("id", $user -> id) -> update($userData);
        return redirect() -> route('user') -> with("successMessage", "Berhasil merubah password");
    }
}
