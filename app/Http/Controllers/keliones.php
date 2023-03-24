<?php

namespace App\Http\Controllers;

use App\Models\kelione;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Auth;
use Illuminate\Support\Facades\DB;

class keliones extends Controller
{
    public function index()
    {
        
        $date = date('Y-m-d h:i:s', time());
        $keliones= DB::table('keliones')->where('isvykimas','>',$date)->orderBy('isvykimas','asc')->get();
        return view('kelione',compact('keliones')); 
    }
    public function create()
    {
        if(Auth::check()){
            if(Auth::user()->tipas > 2)
            {
                $vairuotojai = DB::table('users')->where('tipas','=','2')->get();
                $transportas = DB::table('transportas')->get();
                return view('kelionecreate',compact('vairuotojai','transportas'));
            }
        }
        return redirect()->route('keliones.index'); 
    }
    public function edit($id)
    {
        if(Auth::check()){
            if(Auth::user()->tipas > 2)
            {
                $vairuotojai = DB::table('users')->where('tipas','=','2')->get();
                $kelione= DB::table('keliones')->where('id','=',$id)->first();
                $transportas = DB::table('transportas')->get();
                return view('kelioneedit',compact('kelione','vairuotojai','transportas'));
            }
        }
        return redirect()->route('keliones.index');
    }
    public function update(Request $request,$id)
    {
        if(Auth::check()){
            if(Auth::user()->tipas > 2)
            {
                $update= DB::table('keliones')->where('id',$id)->update([
                    'pradzia_salis' => $request->pradzia_salis,
                    'pradzia_miestas' => $request->pradzia_miestas,
                    'stotis' => $request->stotis,
                    'aprasymas' => $request->aprasymas,
                    'vairuotojo_id' => $request->vairuotojo_id,
                    'tikslas_salis' => $request->tikslas_salis,
                    'tikslas_miestas' => $request->tikslas_miestas,
                    'transporto_id' => $request->transporto_id,
                    'kaina_suaug' => $request->kaina_suaug,
                    'kaina_vaikam' => $request->kaina_vaikam,
                    'isvykimas' => $request->isvykimas,
                    'gryzimas' => $request->gryzimas,
                    'pavadinimas' => $request->pavadinimas,
                ]);
            }
        }
        return redirect()->route('keliones.index');
    }
    public function store(Request $request)
    {
        if(Auth::check()){
            if(Auth::user()->tipas > 2)
            {
                kelione::create($request->all());
            }
        }
        return redirect()->route('keliones.index');
    }
    public function show($id)
    {
        $kelione= DB::table('keliones')->where('id','=',$id)->first();
        return view('kelioneshow',compact('kelione')); 
    }
}
