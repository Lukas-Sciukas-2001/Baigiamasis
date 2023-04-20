<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\uzsakym;
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
        if($request->uzmokest_tipas == "Internetu")
        {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $charge = Stripe\Charge::create ([
                    "amount" => $request->kaina*100,
                    "currency" => "eur",
                    "source" => $request->stripeToken,
                    "description" => "Testing integration"
            ]);
            if($charge->status == 'succeeded'){
            Session::flash('success', 'Payment successful!');
            uzsakym::create($request->all());
            }
        }
        else
        {
            Session::flash('success', 'Payment successful!');
            uzsakym::create($request->all());
        }
        return redirect()->route('keliones.show',$request->keliones_id);
    }
}