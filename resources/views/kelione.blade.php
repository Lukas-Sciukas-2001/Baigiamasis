<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div>
        @if(Auth::check())
            @if(Auth::user()->tipas > 2)
                @foreach($nematomos as $nematomas)
                    <div class="overflow-hidden m-5 bg-white shadow sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-base font-semibold leading-6 text-gray-900">{{$nematomas->pavadinimas}}<br> {{$nematomas->visibility}}</h3>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            @foreach($vairuotojai as $vairuotojas)
                                @if($vairuotojas->id == $nematomas->vairuotojo_id)
                                    <dt class="text-sm font-medium text-gray-900">{{$vairuotojas->name}} {{$vairuotojas->pavarde}}</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$vairuotojas->telefonas}} {{$vairuotojas->email}}</dd>
                                @endif
                            @endforeach
                        </div>
                        <div class="border-t border-gray-200">
                            <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                @if($nematomas->kaina_suaug == $nematomas->kaina_vaikam)
                                    <dt class="text-sm font-medium text-gray-900">Kaina: {{$nematomas->kaina_suaug}}</dt>
                                @else
                                    <dt class="text-sm font-medium text-gray-900">Kaina suaugusiems: {{$nematomas->kaina_suaug}}</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Kaina vaikams: {{$nematomas->kaina_vaikam}}</dd>
                                @endif
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-900">Išvyksta: {{$nematomas->isvykimas}} iš {{$nematomas->stotis}}, {{$nematomas->pradzia_miestas}}</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Grįžta: {{$nematomas->gryzimas}}</dd>
                            </div>
                            
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <form method="GET" action="{{route('keliones.show',$nematomas->id)}}">
                                    @csrf
                                    <input type="submit" value = "Daugiau informacijos" class="border-2 p-0.5 rounded-lg cursor:auto">
                                </form>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <form method="GET" action="{{route('keliones.edit',$nematomas->id)}}">
                                     @csrf
                                    <button class="btn-info" type="submit">Redaguoti</button>
                                </form>
                            </div>
                            </dl>
                        </div>
                    </div>
                @endforeach 
            @endif
        @endif
        <hr>
        <div >
        <form class="translate-x-1/4" method="POST" action="{{route('filtras.index')}}">
            @method("GET")
            @csrf
            <input name="minkaina" type="number" placeholder="Kaina nuo">
            <input name="maxkaina" type="number" placeholder="Kaina iki">
            <input name="datenuo" type="datetime-local" placeholder="Data nuo">
            <input name="dateiki" type="datetime-local" placeholder="Data iki"><br>
            <div>
                <input name="norimsalis" type="text" placeholder="Norima šalis">
                <input name="norimmiest" type="text" placeholder="Norimas miestas">
                <input class="btn-success rounded-lg p-0.5" type="submit" value ="Filtruoti">
            </div>
        </form>
        </div>
        @foreach($keliones as $kelione)
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
                    <dt class="text-sm font-medium text-gray-900">Laisvos vietos: {{$vietos[$kelione->id]}}</dt>
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
                @if(Auth::check())
                @if(Auth::user()->tipas > 2)
                    <form method="GET" action="{{route('keliones.edit',$kelione->id)}}">
                        @csrf
                        <button class="border-2 p-0.5 btn-primary rounded-lg cursor:auto" type="submit">Redaguoti</button>
                    </form>
                    </div>
                 @foreach($vairuotojai as $vairuotojas)
                             @if($vairuotojas->id == $kelione->vairuotojo_id)
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-900">{{$vairuotojas->name}} {{$vairuotojas->pavarde}}</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$vairuotojas->telefonas}} {{$vairuotojas->email}}</dd>
                                </div>
                            @endif
                        @endforeach
                @endif
            @endif
                </dl>
                
            </div>
        </div>
        @endforeach
        {{ $keliones->links()}}
    </div>
</x-app-layout>