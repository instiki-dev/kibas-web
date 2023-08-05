<?php

namespace App\Http\Controllers\Admin\Pengumuman;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class TambahPengumumanDBController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $validate = $request -> validate([
            "berita" => "required"
        ]);
        Berita::create($validate);
        return redirect() -> route('dashboard') -> with('successMessage', "Berita telah ditambahkan");
    }
}
