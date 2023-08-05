<?php

namespace App\Http\Controllers\Admin\Profil;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;

class EditAdminController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $admin = Pegawai::where('user_id', $request -> user() -> id) -> first();

        $validate = $request -> validate([
            "name" => "required",
            "fullname" => "required",
            "email" => "required|email"
        ]);

        $user = $request -> user();

        $username = $user -> name == $validate["name"] ?
                $user -> name : $validate["name"];

        $email = $user -> email == $validate["email"] ?
                $user -> email : $validate["email"];

        $fullname = $admin -> nama == $validate["fullname"] ?
                $admin -> nama : $validate["fullname"];

        $userData = [
                "name" => $username,
                "email" => $email
            ];
        if ($request -> password) {
            if (strlen($request -> password) >= 10) {
                $userData["password"] = bcrypt($request -> password);
            }
        }
        User::where('id', $user -> id) -> update($userData);

        $pegawaiData = ["nama" => $fullname];
        Pegawai::where('id', $admin -> id) -> update($pegawaiData);
        return redirect() -> route('profil') -> with('successMessage', 'Berhasil mengubah data');
    }
}
