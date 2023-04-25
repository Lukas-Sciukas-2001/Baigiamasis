<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div>
        <hr>
        
        <h3>Artejančios kelionės</h3>
        @foreach($buskeliones as $kelione)
        <div class="overflow-hidden m-5 bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">{{$kelione->pavadinimas}}</h3>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                @if($kelione->kaina_suaug == $kelione->kaina_vaikam)
                    <dt class="text-sm font-medium text-gray-900">Kaina: {{$kelione->kaina_suaug}}€</dt>
                @else
                    <dt class="text-sm font-medium text-gray-900">Kaina suaugusiems: {{$kelione->kaina_suaug}}€</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Kaina vaikams: {{$kelione->kaina_vaikam}}€</dd>
                @endif
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-900">Išvyksta: {{$kelione->isvykimas}} iš {{$kelione->stotis}}, {{$kelione->pradzia_miestas}}</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Grįžta: {{$kelione->gryzimas}}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <form method="GET" action="{{route('keliones.show',$kelione->id)}}">
                        @csrf
                        <input type="submit" value = "Daugiau informacijos" class="border-2 p-0.5 btn-info rounded-lg cursor:auto">
                    </form>
                </dl>
                
            </div>
        </div>
        @endforeach
        <h3>Įvykusios kelionės</h3>
        @foreach($jaukeliones as $kelione)
        <div class="overflow-hidden m-5 bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">{{$kelione->pavadinimas}}</h3>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                @if($kelione->kaina_suaug == $kelione->kaina_vaikam)
                    <dt class="text-sm font-medium text-gray-900">Kaina: {{$kelione->kaina_suaug}}€</dt>
                @else
                    <dt class="text-sm font-medium text-gray-900">Kaina suaugusiems: {{$kelione->kaina_suaug}}€</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Kaina vaikams: {{$kelione->kaina_vaikam}}€</dd>
                @endif
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-900">Išvyksta: {{$kelione->isvykimas}} iš {{$kelione->stotis}}, {{$kelione->pradzia_miestas}}</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Grįžta: {{$kelione->gryzimas}}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <form method="GET" action="{{route('keliones.show',$kelione->id)}}">
                        @csrf
                        <input type="submit" value = "Daugiau informacijos" class="border-2 p-0.5 btn-info rounded-lg cursor:auto">
                    </form>
                </dl>
                
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>