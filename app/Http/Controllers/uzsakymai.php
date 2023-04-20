<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\uzsakym;
use Session;
use Stripe;
use Auth;
use Illuminate\Support\Facades\DB;

class uzsakymai extends Controller
{
    public function show($id)
    {             
        $kelione = DB::table('keliones')->where('id','=',$id)->first();
        return view('stripe',compact('kelione'));
    }
    public function store(Request $request)
    {
        dd($request);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100,
                "currency" => "eur",
                "source" => $request->stripeToken,
                "description" => "Testing integration"
        ]);
         uzsakym::create($request->all());
         return redirect()->route('keliones.show',$request->keliones_id);
    }
    //
}
