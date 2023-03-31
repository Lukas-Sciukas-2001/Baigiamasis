<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\uzsakym;

use Auth;
use Illuminate\Support\Facades\DB;

class uzsakymai extends Controller
{
    public function show($id)
    {             
        $kelione = DB::table('keliones')->where('id','=',$id)->first();
        return view('uzsakymaicreate',compact('kelione'));
    }
    public function store(Request $request)
    {
         uzsakym::create($request->all());
         return redirect()->route('keliones.index');
    }
    //
}
