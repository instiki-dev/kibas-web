<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $month = Carbon::now() -> subDays(30) ->toDateString();
        $pengaduan = Pengaduan::where('created_at', '>', $month) -> get();
        return view('adminlte.pengaduan', ["data" => $pengaduan]);
    }
}
