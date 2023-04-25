<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transport;
use Carbon\Carbon;

use Auth;
use Illuminate\Support\Facades\DB;



class transportas extends Controller
{
    public function index()
    {
        if(Auth::check()){
            if(Auth::user()->tipas > 2)
            {
                $transportas= DB::table('transportas')->where('deleted_at',NULL)->get();
                return view('transportas',compact('transportas')); 
            }
        }
        return redirect()->route('keliones.index');
    }
    public function create()
    {
        if(Auth::check()){
            if(Auth::user()->tipas > 2)
            {
                return view('transportascreate');
            }
        }
        return redirect()->route('keliones.index');
    }
    public function store(Request $request)
    {
        if(Auth::check()){
            if(Auth::user()->tipas > 2)
            {
                transport::create($request->all());
                return redirect()->route('transportas.index');
            }
        } 
        return redirect()->route('keliones.index');
    }
    public function edit($id)
    {
        if(Auth::check()){
            if(Auth::user()->tipas > 2)
            {
                $transportas= DB::table('transportas')->where('id','=',$id)->first();
                return view('transportasedit',compact('transportas'));
                return redirect()->route('transportas.index');
            }
        }
        return redirect()->route('keliones.index');
    }
    public function destroy($id)
    {
        if(Auth::check()){
            if(Auth::user()->tipas > 2)
            {
                $delete=transport::where('id',$id)->firstOrFail();
                $delete->delete();
                return redirect()->route('transportas.index');
            }
        }
        return redirect()->route('keliones.index');
    }
    public function update(Request $request,$id)
    {
        if(Auth::check()){
            if(Auth::user()->tipas > 2)
            {
                $request->validate([
                    'modelis' => 'required',
                    'identif' => 'required',
                    'vietos' => 'required',
                ]);
                $transportas = transport::find($id);
                $transportas->modelis=$request->modelis;
                $transportas->identif=$request->identif;
                $transportas->vietos=$request->vietos;
                $transportas->save();
                return redirect()->route('transportas.index');
            }
        }
        return redirect()->route('keliones.index');
    }
    public function show(Request $request,$id)
    {
        if(Auth::check()){
            if(Auth::user()->tipas > 2)
            {
                $request->validate([
                    'modelis' => 'required',
                    'identif' => 'required',
                    'vietos' => 'required',
                ]);
                $transportas = transport::find($id);
                $transportas->modelis=$request->modelis;
                $transportas->identif=$request->identif;
                $transportas->vietos=$request->vietos;
                $transportas->save();
                return redirect()->route('transportas.index');
            }
        }
        return redirect()->route('keliones.index');
    }
    //
}
