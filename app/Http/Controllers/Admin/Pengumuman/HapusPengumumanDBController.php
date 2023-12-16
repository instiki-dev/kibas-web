<?php

namespace App\Http\Controllers\Admin\Pengumuman;

use App\Http\Controllers\Controller;
// use App\Models\Berita;
use App\Models\PengumumanMaster;
use Illuminate\Http\Request;

class HapusPengumumanDBController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, PengumumanMaster $pengumuman)
    {
        // return 'halo';
        // dd(PengumumanMaster::where('id', $pengumuman -> id)->get());
        PengumumanMaster::where('id', $pengumuman -> id) -> delete();
        return redirect() -> route('dashboard') -> with('successMessage', 'Pengumuman telah terhapus');
    }
}
