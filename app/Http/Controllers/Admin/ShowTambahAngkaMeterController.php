<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BacaMeter;
use App\Models\Rekening;
use Illuminate\Http\Request;

class ShowTambahAngkaMeterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, BacaMeter $meter)
    {
        return view('adminlte.konfirmasimeter', ["data" => $meter]);
    }
}
