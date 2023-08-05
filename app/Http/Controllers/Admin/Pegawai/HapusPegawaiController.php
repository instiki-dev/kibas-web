<?php

namespace App\Http\Controllers\Admin\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;

class HapusPegawaiController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Pegawai $pegawai)
    {
        $user_id = $pegawai -> user -> id;
        User::where('id', $user_id) -> delete();
        Pegawai::where('id', $pegawai -> id) -> delete();
        return redirect() -> route('pegawai') -> with("successMessage", "Data pegawai telah terhapus");
    }
}
