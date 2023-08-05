<?php

namespace App\Http\Controllers\Admin\Profil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TambahAdminController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // return view("admin.tambahadmin");
        return view("adminlte.tambahadmin");
    }
}
