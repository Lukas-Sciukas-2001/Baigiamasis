<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div>
        <a href="{{ route('keliones.index')}}">Atgal</a>
        <div class="overflow-hidden m-5 bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">{{$kelione->pradzia_miestas}} - {{$kelione->tikslas_miestas}}</h3>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-900">Kaina suaugusiems: {{$kelione->kaina_suaug}}</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Kaina vaikams: {{$kelione->kaina_vaikam}}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-900">Išvyksta: {{$kelione->isvykimas}}</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Grįžta: {{$kelione->gryzimas}}</dd>
                </div>
                <div class="bg-white px-4 py-5 border-2 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-900">{{$kelione->aprasymas}}</dt>
                </div>
                    @if(Auth::check())
                        @if(Auth::user()->tipas > 2)
                            <div>
                                <form method="GET" action="{{route('uzsakymai.show',$kelione->id)}}">
                                    @csrf
                                    <input type="hidden", value="{{$kelione->id}}">
                                    <button type="submit">Pridėti keleivį</button>
                                </form>
                            </div>
                        @endif
                    @endif
                    <div>
                        <form method="GET" action="{{route('uzsakymai.show',$kelione->id)}}">
                             @csrf
                             <button type="submit">Užsisakyti</button>
                        </form>
                    </div>
                </dl>
            </div>
        </div>
    </div>
    @foreach($keleiviai as $keleivis)
        {{$keleivis->vardas}} - {{$keleivis->pavarde}}<br>
    @endforeach
</x-app-layout>