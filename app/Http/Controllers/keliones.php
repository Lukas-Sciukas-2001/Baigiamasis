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
        
        $keliones= DB::table('keliones')->get();
        return view('kelione',compact('keliones')); 
    }
    public function create()
    {
        if(Auth::user()->tipas > 2)
        {
            $vairuotojai = DB::table('users')->where('tipas','=','2')->get();
            $transportas = DB::table('transportas')->get();
            return view('kelionecreate',compact('vairuotojai','transportas'));
        }
        $keliones= DB::table('keliones')->get();
        return view('kelione',compact('keliones')); 
    }
    public function store(Request $request)
    {
        if(Auth::user()->tipas > 2)
        {
            kelione::create($request->all());
        }
        $keliones= DB::table('keliones')->get();
        return view('kelione',compact('keliones')); 
    }
}
