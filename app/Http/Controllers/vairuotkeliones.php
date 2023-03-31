<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use Auth;
use Illuminate\Support\Facades\DB;

class vairuotkeliones extends Controller
{
    public function index()
    {
        
        $date = date('Y-m-d h:i:s', time());
        if(Auth::check()){
            if(Auth::user()->tipas == 2)
            {
                $keliones = DB::table('keliones')->where('vairuotojo_id','=',Auth::user()->id)->join('transportas','transportas.id','=','transporto_id')->orderBy('isvykimas','asc')->get();
                return view('priskirtos',compact('keliones')); 
            }
        }
        return redirect()->route('keliones.index');
    }
    //
}
