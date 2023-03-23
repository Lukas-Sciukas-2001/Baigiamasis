<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use Auth;
use Illuminate\Support\Facades\DB;

class keliones extends Controller
{
    public function index()
    {
        
        $keliones = DB::table('keliones')->select(
        'keliones.pradzia',
        'keliones.pabaiga',
        'keliones.vietos',
        'keliones.kaina',
        'keliones.data')->get();
        return view('kelione'); 
    }
}
