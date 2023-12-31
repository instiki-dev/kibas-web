<?php

namespace App\Http\Controllers\Admin\Pengumuman;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class HapusPengumumanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Berita $pengumuman)
    {
        Berita::where('id', $pengumuman -> id) -> delete();
        return redirect() -> route('dashboard') -> with('successMessage', 'Pengumuman telah terhapus');
    }
}
