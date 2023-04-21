<?php

namespace App\Http\Controllers;

use App\Models\kelione;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Auth;
use Illuminate\Support\Facades\DB;

class ivykKelionController extends Controller
{
    public function index()
    {
        $date = date('Y-m-d h:i:s', time());
        $keliones= DB::table('uzsakymai')->where('user_id',Auth::user()->id)->get();
        dd($keliones);
        return view('ivykkelione',compact('keliones'));
    }
    //
}
