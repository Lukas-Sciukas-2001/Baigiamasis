<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div>
        <hr>
        
        <h3>Artejančios kelionės</h3>
        <table class='table'>
        <tr>
            <th>Kelione</th>
            <th>Išvykimas</th>
            <th>Gryžimas</th>
            <th>Užmokeščio tipas</th>
            <th>Sumokėti pinigai</th>
            <th></th>

        </tr>
        @foreach($kelione as $arteja)
        <tr>
            <td>{{$arteja['pradzia_miestas']}} - {{$arteja['tikslas_miestas']}}</td>
            <td>{{$arteja['isvykimas']}}</td>
            <td>{{$arteja['gryzimas']}}</td>
            <td>{{$arteja['uzmokest_tipas']}}</td>
            <td>{{$arteja['suma']}}€</td>
            <td><form>
                @csrf
            <input type="hidden" value="{{$arteja['uzsak_id']}}">
            <input type="submit" class="btn btn-danger" value="Atšaukti">
            </form></td>

        </tr>
        @endforeach
        </table>
        <h3>Ivykusios</h3>
        <table class='table'>
        <tr>
            <th>Kelione</th>
            <th>Išvykimas</th>
            <th>Gryžimas</th>
            <th>Užmokeščio tipas</th>
            <th>Sumokėti pinigai</th>

        </tr>
        @foreach($kelionebuv as $buvo)
        <tr>
            <td>{{$buvo['pradzia_miestas']}} - {{$buvo['tikslas_miestas']}}</td>
            <td>{{$buvo['isvykimas']}}</td>
            <td>{{$buvo['gryzimas']}}</td>
            <td>{{$buvo['uzmokest_tipas']}}</td>
            <td>{{$buvo['suma']}}€</td>

        </tr>
        @endforeach
        </table>
    </div>
</x-app-layout>