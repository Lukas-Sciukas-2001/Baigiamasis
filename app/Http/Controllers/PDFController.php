<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PDFController extends Controller
{
    public function index()
    {
        $id = Request::input('keliones_id');
        $kelione= DB::table('keliones')->where('keliones.id','=',$id)->join("transportas","transportas.id","=","keliones.transporto_id")->select("keliones.*","transportas.vietos")->first();
        $keleiviai = DB::table('uzsakymai')->where('keliones_id','=',$kelione->id)->get();
        $pdf = PDF::loadView('kelionePDF', compact('kelione', 'keleiviai'));
        $isvyk=$kelione->isvykimas;
        $laikas= strtotime($isvyk);
        $date = date('Y-m-d', $laikas);
        
        return $pdf->download('kelione_ataskaita_'.$date.'.pdf');
    }
    //
}
