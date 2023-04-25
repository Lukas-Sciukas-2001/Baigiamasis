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
        $buskeliones= DB::table('uzsakymai')->join("keliones","keliones.id","=","uzsakymai.keliones_id")->where('isvykimas','>',$date)->where('user_id',Auth::user()->id)->get();
        
        $jaukeliones= DB::table('uzsakymai')->join("keliones","keliones.id","=","uzsakymai.keliones_id")->where('isvykimas','<=',$date)->where('user_id',Auth::user()->id)->get();

        return view('ivykkelione',compact('buskeliones','jaukeliones'));
    }
    //
}
