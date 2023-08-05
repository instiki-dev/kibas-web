<?php

namespace App\Http\Controllers\Admin\Rekening;

use App\Http\Controllers\Controller;
use App\Models\Rekening;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class FilterTagihanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Rekening $rekening)
    {
        if ($request -> query('filter')) {
            $value = $request -> query('filter');
            $value = substr($value, 1, strlen($value) - 2);

            if ($value == '1') {
                $tagihan= Tagihan::where('status',  2);
            } else if($value == '2') {
                $tagihan= Tagihan::where('status', 1);
            } else {
                $tagihan= Tagihan::orderBy('created_at', 'DESC');
            }

            $tagihan -> with('rekening')
                    -> whereHas('rekening', function($q)use($rekening){
                        $q -> where('id', $rekening -> id);
                    });
            $tagihan = $tagihan -> get();
            return view('admin.filtertagihan', ["data" => $tagihan]);
        }
    }
}
