<?php

namespace App\Http\Controllers\Admin\Kelurahan;

use App\Http\Controllers\Controller;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class SearchKelurahanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request -> query('kelurahan')) {
            $value = $request -> query('kelurahan');
            if (strlen($value) > 2) {
                $value = substr($value, 1, strlen($value) - 2);
                $kelurahan= Kelurahan::where('kelurahan', 'LIKE', '%'.$value.'%') -> get();
            } else {
                $kelurahan = Kelurahan::all();
            }
        }
        return view('admin.searchkelurahan', ["data" => $kelurahan]);
    }
}
