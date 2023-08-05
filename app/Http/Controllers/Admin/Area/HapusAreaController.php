<?php

namespace App\Http\Controllers\Admin\Area;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class HapusAreaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Area $area)
    {
        Area::where("id", $area -> id) -> delete();
        return redirect() -> route('area') -> with("successMessage", "Data area telah terhapus");
    }
}
