<?php

namespace App\Http\Controllers\Admin\Golongan;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use Illuminate\Http\Request;

class SearchGolonganController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request -> query('golongan')) {
            $value = $request -> query('golongan');
            if (strlen($value) > 2) {
                $value = substr($value, 1, strlen($value) - 2);
                $golongan = Golongan::where('golongan', 'LIKE', '%'.$value.'%') -> get();
            } else {
                $golongan = Golongan::all();
            }

        }
        return view('admin.searchgolongan', ["data" => $golongan]);
    }
}
