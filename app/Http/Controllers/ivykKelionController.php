<?php

namespace App\Http\Controllers;

use App\Models\kelione;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Auth;
use Illuminate\Support\Facades\DB;

class ivykKelionController extends Controller
{
    public function index()
    {
        $date = date('Y-m-d h:i:s', time());
        $buskeliones= DB::table('uzsakymai')->join("keliones","keliones.id","=","uzsakymai.keliones_id")->where('isvykimas','>',$date)->where('user_id',Auth::user()->id)->orderBy('isvykimas','asc')->get();
        $kelione=[];
        $kelione[0]=[

            'id'=>$buskeliones[0]->keliones_id,
            'uzsak_id'=>$buskeliones[0]->id,
            'uzmokest_tipas'=>$buskeliones[0]->uzmokest_tipas,
            'pradzia_salis'=>$buskeliones[0]->pradzia_salis,
            'pradzia_miestas'=>$buskeliones[0]->pradzia_miestas,
            'stotis'=>$buskeliones[0]->stotis,
            'tikslas_salis'=>$buskeliones[0]->tikslas_salis,
            'tikslas_miestas'=>$buskeliones[0]->tikslas_miestas,
            'isvykimas'=>$buskeliones[0]->isvykimas,
            'gryzimas'=>$buskeliones[0]->gryzimas,
            'suma'=>$buskeliones[0]->kaina,
        ];
        $x=0;
        $y=0;
        foreach($buskeliones as $jau)
        {
            $arbuvo=false;
            if($x == 1)
            {
                for($z=0; $z<=$y;$z++)
                {
                    if($kelione[$z]['id'] == $jau->keliones_id)
                    {
                        $kelione[$z]['suma'] =  $kelione[$z]['suma']+$jau->kaina;
                        $arbuvo=true;  
                    }
                }
                if($arbuvo == false){
                    $y++;
                    $kelione[$y]=[

                    'id'=>$jau->keliones_id,
                    'uzsak_id'=>$jau->id,
                    'uzmokest_tipas'=>$jau->uzmokest_tipas,
                    'pradzia_salis'=>$jau->pradzia_salis,
                    'pradzia_miestas'=>$jau->pradzia_miestas,
                    'stotis'=>$jau->stotis,
                    'tikslas_salis'=>$jau->tikslas_salis,
                    'tikslas_miestas'=>$jau->tikslas_miestas,
                    'isvykimas'=>$jau->isvykimas,
                    'gryzimas'=>$jau->gryzimas,
                    'suma'=>$jau->kaina,
                ];
            }

                
            }
            else
            {
                $x++;
            }

        }

        $jaukeliones= DB::table('uzsakymai')->join("keliones","keliones.id","=","uzsakymai.keliones_id")->where('isvykimas','<=',$date)->where('user_id',Auth::user()->id)->orderBy('isvykimas','asc')->get();
        $kelionebuv=[];
        $kelionebuv[0]=[

            'id'=>$jaukeliones[0]->keliones_id,
            'uzsak_id'=>$jaukeliones[0]->id,
            'uzmokest_tipas'=>$jaukeliones[0]->uzmokest_tipas,
            'pradzia_salis'=>$jaukeliones[0]->pradzia_salis,
            'pradzia_miestas'=>$jaukeliones[0]->pradzia_miestas,
            'stotis'=>$jaukeliones[0]->stotis,
            'tikslas_salis'=>$jaukeliones[0]->tikslas_salis,
            'tikslas_miestas'=>$jaukeliones[0]->tikslas_miestas,
            'isvykimas'=>$jaukeliones[0]->isvykimas,
            'gryzimas'=>$jaukeliones[0]->gryzimas,
            'suma'=>$jaukeliones[0]->kaina,
        ];
        $x=0;
        $y=0;
        foreach($jaukeliones as $jau)
        {
            $arbuvo=false;
            if($x == 1)
            {
                for($z=0; $z<=$y;$z++)
                {
                    if($kelionebuv[$z]['id'] == $jau->keliones_id)
                    {
                        $kelionebuv[$z]['suma'] =  $kelionebuv[$z]['suma']+$jau->kaina;
                        $arbuvo=true;  
                    }
                }
                if($arbuvo == false){
                    $y++;
                    $kelionebuv[$y]=[

                    'id'=>$jau->keliones_id,
                    'uzsak_id'=>$jau->id,
                    'uzmokest_tipas'=>$jau->uzmokest_tipas,
                    'pradzia_salis'=>$jau->pradzia_salis,
                    'pradzia_miestas'=>$jau->pradzia_miestas,
                    'stotis'=>$jau->stotis,
                    'tikslas_salis'=>$jau->tikslas_salis,
                    'tikslas_miestas'=>$jau->tikslas_miestas,
                    'isvykimas'=>$jau->isvykimas,
                    'gryzimas'=>$jau->gryzimas,
                    'suma'=>$jau->kaina,
                ];
            }

                
            }
            else
            {
                $x++;
            }

        }
        return view('ivykkelione',compact('buskeliones','jaukeliones','kelione','kelionebuv'));
    }
    //
}
