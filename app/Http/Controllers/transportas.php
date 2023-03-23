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
    //
}
