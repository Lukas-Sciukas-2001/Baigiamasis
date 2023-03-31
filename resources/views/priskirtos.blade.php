<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div>
        @foreach($keliones as $kelione)
        <div class="overflow-hidden m-5 bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">{{$kelione->pavadinimas}}</h3>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-900">Kaina suaugusiems: {{$kelione->kaina_suaug}}</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Kaina vaikams: {{$kelione->kaina_vaikam}}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-900">Išvyksti: {{$kelione->isvykimas}} iš {{$kelione->stotis}}, {{$kelione->pradzia_miestas}}</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Grįžti: {{$kelione->gryzimas}}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-900">Transportas: {{$kelione->identif}} - {{$kelione->modelis}}</dt>
                </div>
                </dl>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <form method="GET" action="{{route('vairuotkeliones.show',$kelione->id)}}">>
                         @csrf
                        <button type="submit">Keleiviai</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>