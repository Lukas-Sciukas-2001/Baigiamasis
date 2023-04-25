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
                $date = date('Y-m-d h:i:s', time());
                $keliones = DB::table('keliones')->where('isvykimas','>',$date)->where('vairuotojo_id','=',Auth::user()->id)->join('transportas','transportas.id','=','transporto_id')->select("keliones.*","transportas.vietos","transportas.identif","transportas.modelis")->orderBy('isvykimas','asc')->get();
                return view('priskirtos',compact('keliones')); 
            }
        }
        return redirect()->route('keliones.index');
    }
    public function show($id)
    {
        $kelione= DB::table('keliones')->where('keliones.id','=',$id)->join("transportas","transportas.id","=","keliones.transporto_id")->select("keliones.*","transportas.vietos")->first();
        $keleiviai = DB::table('uzsakymai')->where('keliones_id','=',$kelione->id)->get();
        $laisvos=$kelione->vietos-count($keleiviai);
        return view('vairuotkelioneshow',compact('kelione','keleiviai','laisvos')); 
    }
    //
}
