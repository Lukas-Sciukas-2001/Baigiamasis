<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\uzsakym;
use App\Models\charges;
use Auth;
use Illuminate\Support\Facades\DB;
    
class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe($id)
    {
        $kelione = DB::table('keliones')->where('id','=',$id)->first();
        return view('stripe',compact('kelione'));
    }

   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function stripePost(Request $request)
    {
        $kelione = $kelione = DB::table('keliones')->where('id','=',$request->keliones_id)->first();
        $suma = $request->suauge*$kelione->kaina_suaug+$request->vaikai*$kelione->kaina_vaikam;
        $mokantysis = $request->vardas[0]." ".$request->pavarde[0];
        if($request->uzmokest_tipas == "Internetu")
        {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $charge = Stripe\Charge::create ([
                    "amount" => $suma*100,
                    "currency" => "eur",
                    "source" => $request->stripeToken,
                    "description" => "Testing integration"
            ]);
            if($charge->status == 'succeeded'){
            $chargedb=[
                'tipas' => 'Mokejimas',
                'charge_id' => $charge->id,
                'uzsakymo_id' => $request->keliones_id,
                'suma' => $suma,
            ];
            charges::create($chargedb);
            Session::flash('success', 'Mokėjimas sekmingas!');
            for($x = 0; $x < $request->suauge; $x++)
                {
                    $asmuo=[
                        'user_id' => $request->user_id,
                        'keliones_id' => $request->keliones_id,
                        'patvirt_busena' => 'Patvirtinta',
                        'vardas' => $request->vardas[$x],
                        'pavarde' => $request->pavarde[$x],
                        'uzmokest_tipas' => $request->uzmokest_tipas,
                        'kaina' => $kelione->kaina_suaug,
                        'mokantysis' => $mokantysis
                    ];
                    uzsakym::create($asmuo);
                }
            for($x = $request->suauge; $x < $request->suauge+$request->vaikai; $x++)
                {
                    $asmuo=[
                        'user_id' => $request->user_id,
                        'keliones_id' => $request->keliones_id,
                        'patvirt_busena' => 'Patvirtinta',
                        'vardas' => $request->vardas[$x],
                        'pavarde' => $request->pavarde[$x],
                        'uzmokest_tipas' => $request->uzmokest_tipas,
                        'kaina' => $kelione->kaina_vaikam,
                        'mokantysis' => $mokantysis
                    ];
                    uzsakym::create($asmuo);
                }
            }
        }
        else
        {

            Session::flash('success', 'Kelionė užsakyta');
            for($x = 0; $x < $request->suauge; $x++)
                {
                    $asmuo=[
                        'user_id' => $request->user_id,
                        'keliones_id' => $request->keliones_id,
                        'patvirt_busena' => 'Patvirtinta',
                        'vardas' => $request->vardas[$x],
                        'pavarde' => $request->pavarde[$x],
                        'uzmokest_tipas' => $request->uzmokest_tipas,
                        'kaina' => $kelione->kaina_suaug,
                        'mokantysis' => $mokantysis
                    ];
                    uzsakym::create($asmuo);
                }

            for($x = $request->suauge; $x < $request->suauge+$request->vaikai; $x++)
                {
                    $asmuo=[
                        'user_id' => $request->user_id,
                        'keliones_id' => $request->keliones_id,
                        'patvirt_busena' => 'Patvirtinta',
                        'vardas' => $request->vardas[$x],
                        'pavarde' => $request->pavarde[$x],
                        'uzmokest_tipas' => $request->uzmokest_tipas,
                        'kaina' => $kelione->kaina_vaikam,
                        'mokantysis' => $mokantysis
                    ];
                    uzsakym::create($asmuo);
                }
        }
        return redirect()->route('keliones.show',$request->keliones_id);
    }
}
