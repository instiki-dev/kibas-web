<?php

namespace App\Http\Controllers\Admin\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;

class HapusPelangganController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Pelanggan $pelanggan)
    {
        $user_id = $pelanggan -> user -> id;
        User::where('id', $user_id) -> delete();
        Pelanggan::where('id', $pelanggan -> id) -> delete();
        return redirect() -> route('pelanggan') -> with("successMessage", "Data pelanggan telah terhapus");
    }
}
