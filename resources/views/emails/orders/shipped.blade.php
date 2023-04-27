<x-mail::message>
Dekojame kad užsisakėte kelionę naudojantis mūsų paslaugomis!

Jusų kelionė į {{$data['tikslas_miestas']}}, {{$data['tikslas_salis']}}
išvyksta {{$data['isvykimas']}} iš {{$data['isvyk_stotis']}}, {{$data['isvyk_miest']}} ir gryžta {{$data['gryzimas']}}

@if($data['mokejimas'] == 'Vietoj')
    Neužmirškite atsinešti {{$data['suma']}}€ kuriuos turite sumokėti už kelionę
@else
    Už kelionę jūs sumokėjote {{$data['suma']}}€
@endif
Tikimės kad kelionė bus linksma ir maloni!

</x-mail::message>
