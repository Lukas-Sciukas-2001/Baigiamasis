<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Auth;
use Illuminate\Support\Facades\DB;

class vairuotojai extends Controller
{
    public function index()
    {
        $vairuotojai= DB::table('users')->where('tipas','=','2')->get();
        return view('vairuotojai',compact('vairuotojai')); 
    }
    //
}
