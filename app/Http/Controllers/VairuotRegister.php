<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use Illuminate\Support\Facades\DB;

class VairuotRegister extends Controller
{
    public function index()
    {
        if(Auth::check()){
            if(Auth::user()->tipas > 2)
            {
                return view('vairuotregister'); 
            }
        }
        return redirect()->route('keliones.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::create([
            'name' => $request->name,
            'pavarde' => $request->pavarde,
            'email' => $request->email,
            'telefonas' => $request->phone,
            'tipas' => '2',
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('vairuotojai.index');
    }

    //
}
