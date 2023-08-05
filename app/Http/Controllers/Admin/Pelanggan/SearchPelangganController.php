<?php

namespace App\Http\Controllers\Admin\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class SearchPelangganController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request -> query('pelanggan')) {
            $value = $request -> query('pelanggan');
            if (strlen($value) > 2) {
                $value = substr($value, 1, strlen($value) - 2);
                // return $value;
                $pelanggan = Pelanggan::where('nama_pelanggan', 'LIKE', '%'.$value.'%') -> orWhere('nik_pelanggan', 'LIKE', '%'.$value.'%') -> get();
            } else {
                $pelanggan = Pelanggan::all();
            }
        }

        return view("admin.searchpelanggan", ["data" => $pelanggan]);
    }
}
