<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BacaMeter;
use App\Models\Pengaduan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BacaMeterMandiriController extends Controller
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
        $meter = BacaMeter::where('created_at', '>', $month) -> orderBy('angka', 'ASC') -> get();
        return view('adminlte.bacametermandiri', ["data" => $meter]);
    }
}
