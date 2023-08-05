<?php

namespace App\Http\Controllers\Admin\Pengaduan;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Rekening;
use Illuminate\Http\Request;

class SearchPengaduanController extends Controller
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
        if ($request -> query('rekening')) {
            $value = $request -> query('rekening');
            if (strlen($value) > 2) {
                $value = substr($value, 1, strlen($value) - 2);
                $rekening = Rekening::where('no_rekening', 'LIKE', '%'.$value.'%') -> get();
            } else {
                $rekening = Rekening::all();
            }


            $pengaduan = [];

            if (count($rekening) > 0) {
                $pengaduan = Pengaduan::where('rekening_id', $rekening[0] -> id);
                for ($i = 1; $i < count($rekening); $i++) {
                    $pengaduan -> orWhere('rekening_id', $rekening[$i] -> id);
                }
                $pengaduan = $pengaduan -> get();
                $pengaduan = $pengaduan -> filter(function($item) {
                    return $item -> status == 1;
                }) -> values();
            }
        }
        return view('admin.searchpengaduan', ["data" => $pengaduan]);
    }
}
