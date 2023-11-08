<?php

namespace App\Http\Controllers\API\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\BacaMeter;
use App\Models\Rekening;
use Illuminate\Http\Request;

class GetBacaMeter extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Rekening $rekening)
    {
        $meter = BacaMeter::where('no_rekening', $rekening -> no_rekening) -> get();
        return response($meter, 200);
    }
}
