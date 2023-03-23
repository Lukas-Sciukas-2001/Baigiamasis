@foreach($keliones as $keliones)
<div style='border-style:solid'>
                   {{$keliones->pradzia}} -
                   {{$keliones->pabaiga}}
                   <br>
                   {{$keliones->pavadinimas}}
                   <br>
                   Laisvos vietos: {{$keliones->vietos}}<br>
                   Kaina: {{$keliones->kaina}} Eur <br>
                   Data: {{$keliones->data}}<br>
</div>

                   
                @endforeach