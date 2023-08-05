<?php

namespace App\Http\Controllers\Admin\Kecamatan;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class SearchKecamatanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        if ($request -> query('kecamatan')) {
            $value = $request -> query('kecamatan');
            if (strlen($value) > 2) {
                $value = substr($value, 1, strlen($value) - 2);
                $kecamatan= Kecamatan::where('kecamatan', 'LIKE', '%'.$value.'%') -> get();
            } else {
                $kecamatan= Kecamatan::all();
            }
        }
        return view('admin.searchkecamatan', ["data" => $kecamatan]);
    }
}
