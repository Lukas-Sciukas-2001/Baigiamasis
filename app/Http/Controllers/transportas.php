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
        $transportas= DB::table('transportas')->get();
        return view('transportas',compact('transportas')); 
    }
    public function create()
    {
        if(Auth::check()){
            if(Auth::user()->tipas > 2)
            {
                return view('transportascreate');
            }
        }
        return redirect()->route('transportas.index');
    }
    public function store(Request $request)
    {
        if(Auth::check()){
            if(Auth::user()->tipas > 2)
            {
                transport::create($request->all());
            }
        } 
        return redirect()->route('transportas.index');
    }
    public function edit($id)
    {
        if(Auth::check()){
            if(Auth::user()->tipas > 2)
            {
                $transportas= DB::table('transportas')->where('id','=',$id)->first();
                return view('transportasedit',compact('transportas'));
            }
        }
        return redirect()->route('transportas.index');
    }
    public function destroy($id)
    {
        if(Auth::check()){
            if(Auth::user()->tipas > 2)
            {
                $deleted=DB::table('transportas')->where('id','=',$id)->delete();
            }
        }
        return redirect()->route('transportas.index');
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
                    'technikinis' => 'required'
                ]);
                $transportas = transport::find($id);
                $transportas->modelis=$request->modelis;
                $transportas->identif=$request->identif;
                $transportas->vietos=$request->vietos;
                $transportas->technikinis=$request->technikinis;
                $transportas->save();
            }
        }
        return redirect()->route('transportas.index');
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
                    'technikinis' => 'required'
                ]);
                $transportas = transport::find($id);
                $transportas->modelis=$request->modelis;
                $transportas->identif=$request->identif;
                $transportas->vietos=$request->vietos;
                $transportas->technikinis=$request->technikinis;
                $transportas->save();
            }
        }
        return redirect()->route('transportas.index');
    }
    //
}
