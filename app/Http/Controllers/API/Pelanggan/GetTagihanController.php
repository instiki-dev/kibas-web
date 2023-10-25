<?php

namespace App\Http\Controllers\API\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Rekening;
use App\Models\Tagihan;
use Exception;
use Illuminate\Http\Request;

class GetTagihanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Rekening $rekening)
    {
        try {
            if ($request -> query('dashboard')) {
                $tagihan = Tagihan::where([
                    ['rekening_id', $rekening -> id],
                    ['status', 0]
                ]) -> paginate(3);
                return response($tagihan, 200);
            }
            $tagihan = Tagihan::where('rekening_id', $rekening ->id) -> paginate();
            return response($tagihan, 200);
        } catch(Exception $e) {
            return response([
                "status" => false,
                "message" => $e -> getMessage()
            ], 200);
        }
    }
}
