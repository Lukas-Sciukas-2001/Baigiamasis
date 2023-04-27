<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div>
        <a class="btn btn-info" href="{{route('transportas.create')}}">Pridėti transporto priemonę</a>
        <table class="table">
        <tr>
            <th>Modelis</th>
            <th>Valstybiniai numeriai</th>
            <th>Max vietos</th>
            <th></th>
        </tr>
        @foreach($transportas as $automobilis)
        <tr>   
            <td>{{$automobilis->modelis}}</td>
            <td>{{$automobilis->identif}}</td>
            <td>{{$automobilis->vietos}}</td>
            <td><form method="GET" action="{{route('transportas.edit',$automobilis->id)}}">
                        @csrf
                        <input type="submit" value = "Redaguoti" class="btn btn-info">
                    </form></td>

        </tr>
        @endforeach  
        </table>
    </div>
</x-app-layout>