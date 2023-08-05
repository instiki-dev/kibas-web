<?php

namespace App\Http\Controllers\Admin\Golongan;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use Illuminate\Http\Request;

class ShowUpdateGolonganController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Golongan $golongan)
    {
        return view('admin.editgolongan', ["golongan" => $golongan]);
    }
}
