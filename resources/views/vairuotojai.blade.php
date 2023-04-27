<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <a class="btn-success rounded-lg p-0.5" href="{{route('vairuotregister.index')}}">Prideti</a>
    <div>
        <table class="table">
            <tr>
                <th>Vardas ir pavardė</th>
                <th>Telefonas</th>
                <th>Email</th>
                <th></th>
            </tr>
        @foreach($vairuotojai as $vairuotojas)
        <tr>
            <td>{{$vairuotojas->name}} {{$vairuotojas->pavarde}}</td>
            <td>{{$vairuotojas->telefonas}}</td>
            <td>{{$vairuotojas->email}}</td>
            <td><a class="btn-info rounded-lg p-0.5" href="{{route('vairuotregister.edit',$vairuotojas->id)}}">Redaguoti</a></td>
        </tr>
        @endforeach
</table>
    </div>
</x-app-layout>