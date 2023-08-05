<?php

namespace App\Http\Controllers\Admin\Kelurahan;

use App\Http\Controllers\Controller;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class ShowUpdateKelurahanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Kelurahan $kelurahan)
    {
        // return view('admin.editkelurahan', ["kelurahan" => $kelurahan]);
        return view('adminlte.editkelurahan', ["kelurahan" => $kelurahan]);
    }
}
