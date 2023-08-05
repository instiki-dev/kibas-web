<?php

namespace App\Http\Controllers\Admin\Area;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class SearchAreaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request -> query('area')) {
            $value = $request -> query('area');
            if (strlen($value) > 2) {
                $value = substr($value, 1, strlen($value) - 2);
                $area = Area::where('area', 'LIKE', '%'.$value.'%') -> get();
            } else {
                $area = Area::all();
            }

        }
        return view('admin.searcharea', ["data" => $area]);
    }
}
