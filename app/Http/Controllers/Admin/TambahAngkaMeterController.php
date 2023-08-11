<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BacaMeter;
use App\Models\Rekening;
use Illuminate\Http\Request;

class TambahAngkaMeterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, BacaMeter $meter)
    {
        $validate = $request -> validate([
            "angka" => "required"
        ]);

        BacaMeter::where('id', $meter -> id) -> update($validate);
        return redirect() -> route('baca-meter-mandiri') -> with('successMessage', 'Berhasil mengkonfirmasi angka meter');
    }
}
