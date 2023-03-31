
<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div>
        <form method="POST" action="{{route('keliones.store')}}">
            @csrf
            <!-- pradzia šalis -->
            <div class="mt-4">
                <x-text-input id="pradzia_salis" class="block mt-1 w-full" type="text" placeholder="Kelionės pradžios šalis" name="pradzia_salis" :value="old('pradzia_salis')" required />
            </div>
            <!-- pradzia miestas -->
            <div class="mt-4">
                <x-text-input id="pradzia_miestas" class="block mt-1 w-full" type="text" placeholder="Kelionės pradžios miestas"  name="pradzia_miestas" :value="old('pradzia_miestas')" required />
            </div>
            <!-- pradzia stotelė -->
            <div class="mt-4">
                <x-text-input id="stotis" class="block mt-1 w-full" type="text" name="stotis" placeholder="Kelionės pradžios stotelė" :value="old('stotis')" required />
            </div>
            <!-- tikslo šalis -->
            <div class="mt-4">
                <x-text-input id="tikslas_salis" class="block mt-1 w-full" type="text" name="tikslas_salis" placeholder="Kelionės tikslo šalis" :value="old('tikslas_salis')" required />
            </div>
            <!-- tikslo miestas -->
            <div class="mt-4"> 
                <x-text-input id="tikslas_miestas" class="block mt-1 w-full" type="text" name="tikslas_miestas" placeholder="Kelionės tikslo miestas" :value="old('tikslas_miestas')" required />
            </div>
            <!-- kelionės pavadinimas -->
            <div class="mt-4">
                <x-text-input id="pavadinimas" class="block mt-1 w-full" type="text" size="20" name="pavadinimas" placeholder="kelionės pavadinimas" :value="old('pavadinimas')" required />
            </div>
            <!-- kelionės aprašymas -->
            <div class="mt-4">
                <x-text-input id="aprasymas" class="block mt-1 w-full" type="text" size="20" name="aprasymas" placeholder="Aprašymas" :value="old('aprasymas')" required />
            </div>
            <!-- Vairuotojai -->
            Vairuotojas
            <div class="mt-4">
                <select id="vairuotojo_id" class="block mt-1 w-full" type="text" name="vairuotojo_id" :value="old('vairuotojo_id')" required>
                    @foreach($vairuotojai as $vairuotojas)
                        <option value='{{$vairuotojas->id}}'>{{$vairuotojas->name}} {{$vairuotojas->pavarde}} {{$vairuotojas->telefonas}}</option>
                    @endforeach
                </select>
            </div>
            <!-- Transportas -->
            Transportas
            <div class="mt-4">
                <select id="transporto_id" class="block mt-1 w-full" type="text" name="transporto_id" :value="old('transporto_id')" required>
                    @foreach($transportas as $automobilis)
                        <option value='{{$automobilis->id}}'>vietos: {{$automobilis->vietos}} {{$automobilis->modelis}} {{$automobilis->identif}}</option>
                    @endforeach
                </select>
            </div>
            <!-- Kaina vaikams -->
            <div class="mt-4">
                <input id="kaina_vaikam" class="block mt-1 w-full" type="number" placeholder="Kaina vaikams" name="kaina_vaikam" :value="old('kaina_vaikam')" required />
            </div>
            <!-- Kaina suaugusiems -->
            <div class="mt-4">
                <input id="kaina_suaug" class="block mt-1 w-full" type="number" placeholder="Kaina suaugusiems" name="kaina_suaug" :value="old('kaina_suaug')" required />
            </div>
            <!-- išvykimas -->
            išvykimo laikas
            <div class="mt-4">
                <label for="isvykimas" :value="__('Išvykimo laikas')" >
                <input id="isvykimas" class="block mt-1 w-full" type="datetime-local" name="isvykimas" :value="old('isvykimas')" required />
            </div>
            <!-- Parvykimo laikas -->
            Parvykimo laikas
            <div class="mt-4">
                <label for="gryzimas" :value="__('Parvykimo laikas')" >
                <input id="gryzimas" class="block mt-1 w-full" type="datetime-local" name="gryzimas" :value="old('gryzimas')" required />
            </div>
            <!-- matomumas -->
            Matomumas
            <div class="mt-4">
                <select id="visibility" class="block mt-1 w-full" type="text" name="visibility" :value="old('visibility')" required>
                    <option value='matomas'>Viešas</option>
                    <option value='nematomas'>Nematomas</option>
                </select>
            </div>
            <div>
                <input type="submit">
            </div>

        </form>
    </div>
</x-app-layout>