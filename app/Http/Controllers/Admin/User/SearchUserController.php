<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SearchUserController extends Controller
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
        if ($request -> query('user')) {
            $value = $request -> query('user');
            if (strlen($value) > 2) {
                $value = substr($value, 1, strlen($value) - 2);
                // return $value;
                $pelanggan = User::where('name', 'LIKE', '%'.$value.'%') -> orWhere('email', 'LIKE', '%'.$value.'%') -> get();
            } else {
                $pelanggan = User::all();
            }
        }

        return view('admin.searchuser', ["data" => $pelanggan]);
    }
}
