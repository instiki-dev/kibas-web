<?php

namespace App\Http\Controllers\Admin\Rekening;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\Rekening;
use Illuminate\Http\Request;

class SearchRekeningController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request -> query('rekening')) {
            $value = $request -> query('rekening');
            if (strlen($value) > 2) {
                $value = substr($value, 1, strlen($value) - 2);
                // return $value;
                $pelanggan = Pelanggan::where('nama_pelanggan', 'LIKE', '%'.$value.'%') -> first();
                $rekening = Rekening::where('no_rekening', 'LIKE', '%'.$value.'%');
                if ($pelanggan) {
                    $rekening = $rekening -> orWhere('pelanggan_id', 'LIKE', '%'.$pelanggan -> id.'%');
                }
                $rekening = $rekening -> get();
            } else {
                $rekening = Rekening::all();
            }
        }

        return view("admin.searchrekening", ["data" => $rekening]);
    }
}
