<?php

namespace App\Http\Controllers\Admin\Profil;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TambahEntitasAdminController extends Controller
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
            "fullname" => "required",
            "name" => "required|unique:users",
            "email" => "required|email",
            "password" => "required|min:10",
            "password2" => "required|same:password"
        ]);

        $password = bcrypt($validate["password"]);

        $user = [
            "name" => $validate["name"],
            "email" => $validate["email"],
            "password" => $password,
        ];


        $userData = User::create($user);

        $userData -> assignRole('Admin');

        $adminData = [
            "user_id" => $userData -> id,
            "nama" => $validate["fullname"],
            "jabatan" => 'Admin'
        ];
        Pegawai::create($adminData);
        return redirect() -> route('dashboard') -> with('successMessage', 'Admin berhasil ditambah');
    }
}
