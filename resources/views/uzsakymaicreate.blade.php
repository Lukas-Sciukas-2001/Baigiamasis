
<x-app-layout>
    <x-slot name="header">
    </x-slot>
    @if(Auth::check())
        @if(Auth::user()->tipas > 2)
            <div>
                <form method="POST" action="{{route('uzsakymai.store')}}">
                    @csrf
                    <!-- vardas -->
                    <div class="mt-4">
                        <x-input-label for="vardas" :value="__('Keleivio vardas')" />
                        <x-text-input id="vardas" class="block mt-1 w-full" type="text" name="vardas" value="{{Auth:user()->name}}" required />
                    </div>
                    <!-- pavarde -->
                    <div class="mt-4">
                        <x-input-label for="pavarde" :value="__('Keleivio pavarde')" />
                        <x-text-input id="pavarde" class="block mt-1 w-full" type="text" name="pavarde" value="Auth:user()->pavarde" required />
                    </div>

                    <!-- uzmokest tipas -->
                    <div class="mt-4">
                        <x-input-label for="uzmokest_tipas" :value="__('Užmokeščio tipas')" />
                        <x-text-input id="uzmokest_tipas" class="block mt-1 w-full" type="text" name="uzmokest_tipas" :value="old('uzmokest_tipas')" required />
                    </div>
                    <!-- kaina -->
                    <div class="mt-4">
                        <x-input-label for="kaina" :value="__('Kaina')" />
                        <x-text-input id="kaina" class="block mt-1 w-full" type="text" name="kaina" :value="old('kaina')" required />
                    </div>
                    <input type="hidden" value="{{ $kelione->id }}" id='keliones_id' name='keliones_id'>
                    <input type="hidden" value="{{ Auth:user()->id }}" id='user_id' name='user_id'>
                    <input type="hidden" value="patvirtinta" id='patvirt_busena' name='patvirt_busena'>
                    <div>
                        <input type="submit">
                    </div>
                </form>
            </div>
        @else
        <div>
                <form method="POST" action="{{route('uzsakymai.store')}}">
                    @csrf
                    <!-- vardas -->
                    <div class="mt-4">
                        <x-input-label for="vardas" :value="__('Keleivio vardas')" />
                        <x-text-input id="vardas" class="block mt-1 w-full" type="text" name="vardas" value="{{Auth::user()->name}}" required />
                    </div>
                    <!-- pavarde -->
                    <div class="mt-4">
                        <x-input-label for="pavarde" :value="__('Keleivio pavarde')" />
                        <x-text-input id="pavarde" class="block mt-1 w-full" type="text" name="pavarde" value="{{Auth::user()->pavarde}}" required />
                    </div>
                    <!-- uzmokest tipas -->
                    <div class="mt-4">
                        Užmokėščio tipas
                        <select id='uzmokest_tipas' name="uzmokest_tipas" class='uzmokest_tipas'>
                                <option value = 'Vietoj'>Vietoje</option>
                                <option value = 'Internetu'>Internetu</option>
                        </select>
                    </div>
                    <!-- kaina -->
                    <div class="mt-4">
                        Keleivio amžius
                        <select id='kaina' name="kaina" class='kaina'>
                                <option value = '{{$kelione->kaina_suaug}}'>Suaugės</option>
                                <option value = '{{$kelione->kaina_vaikam}}'>Vaikas</option>
                        </select>
                    </div>
                    <input type="hidden" value="{{ $kelione->id }}" id='keliones_id' name='keliones_id'>
                    <input type="hidden" value="patvirtinta" id='patvirt_busena' name='patvirt_busena'>
                    <div>
                        <input type="submit">
                    </div>
                </form>
            </div>
        @endif
    @else
        <div>
                <form method="POST" action="{{route('uzsakymai.store')}}">
                    @csrf
                    <!-- vardas -->
                    <div class="mt-4">
                        <x-input-label for="vardas" :value="__('Keleivio vardas')" />
                        <x-text-input id="vardas" class="block mt-1 w-full" type="text" name="vardas" :value="old('vardas')" required />
                    </div>
                    <!-- pavarde -->
                    <div class="mt-4">
                        <x-input-label for="pavarde" :value="__('Keleivio pavarde')" />
                        <x-text-input id="pavarde" class="block mt-1 w-full" type="text" name="pavarde" :value="old('pavarde')" required />
                    </div>
                    <!-- uzmokest tipas -->
                    <div class="mt-4">
                        Užmokėščio tipas
                        <select id='uzmokest_tipas'  name="uzmokest_tipas" class='uzmokest_tipas'>
                                <option value = 'Vietoj'>Vietoje</option>
                                <option value = 'Internetu'>Internetu</option>
                        </select>
                    </div>
                    <!-- kaina -->
                    <div class="mt-4">
                        Keleivio amžius
                        <select id='kaina' name="kaina" class='kaina'>
                                <option value = '{{$kelione->kaina_suaug}}'>Suaugės</option>
                                <option value = '{{$kelione->kaina_vaikam}}'>Vaikas</option>
                        </select>
                    </div>
                    <input type="hidden" value="{{ $kelione->id }}" id='keliones_id' name='keliones_id'>
                    <input type="hidden" value="patvirtinta" id='patvirt_busena' name='patvirt_busena'>
                    <div>
                        <input type="submit">
                    </div>
                </form>
            </div>
    @endif
</x-app-layout>