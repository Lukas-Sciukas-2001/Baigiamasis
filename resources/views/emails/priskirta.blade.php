<x-mail::message>

Laba diena {{$data['vairuotojas']}}

Jums buvo priskirta kelionė į {{$data['tikslas_miestas']}}, {{$data['tikslas_salis']}}
išvyksta {{$data['isvykimas']}} iš {{$data['isvyk_stotis']}}, {{$data['isvyk_miest']}} ir gryžta {{$data['gryzimas']}}

Jusų transporto priemonė yra {{$data['numeriai']}} {{$data['modelis']}} 
Neužmirškite pasiimti kelionės keleivių sarašo.
Geros dienos.

</x-mail::message>
