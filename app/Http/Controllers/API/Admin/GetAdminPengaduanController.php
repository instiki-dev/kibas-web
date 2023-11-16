<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Error;
use Illuminate\Http\Request;

class GetAdminPengaduanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request) {
        try {
            $pengaduan = Pengaduan::orderBy('status', 'ASC')
                -> with(['pelanggan:id,nama_pelanggan', 'rekening', 'petugas:id,nama'])
                -> paginate(10);
            return response($pengaduan, 200);
        } catch(Error $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
