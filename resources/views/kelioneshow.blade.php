<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div>
        <a class="btn-secondary p-0.5" href="{{url()->previous()}}">Atgal</a>
        @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                    @endif
        @if(Auth::check())
            @if(Auth::user()->tipas > 2)
            <div class="overflow-hidden m-5 bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">{{$vairuotojas->name}} {{$vairuotojas->pavarde}}</h3>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-900">Telefonas</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$vairuotojas->telefonas}}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-900">El. paštas</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$vairuotojas->email}}</dd>
                </div>
                </dl>
            </div>
        </div>
            @endif
        @endif
        <div class="overflow-hidden m-5 bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">{{$kelione->pradzia_miestas}} - {{$kelione->tikslas_miestas}}</h3>
                <br>
                Vietos - {{$laisvos}}
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
                                    <button class="btn-info p-0.5 rounded-lg" type="submit">Pridėti keleivį</button>
                                </form>
                            </div>
                        @endif
                    @endif
                    @if($laisvos >= 1)
                    <div>
                        <form method="GET" action="{{route('uzsakymai.show',$kelione->id)}}">
                             @csrf
                             <button class="btn-success p-0.5 rounded-lg" type="submit">Užsisakyti</button>
                        </form>
                    </div>
                    @else
                    <div class="bg-white px-4 py-5 border-2 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-900">Visos vietos užimtos</dt>
                    </div>
                    @endif
                </dl>
            </div>
        </div>
    </div>
    @foreach($keleiviai as $keleivis)
        {{$keleivis->vardas}} - {{$keleivis->pavarde}} - {{$keleivis->uzmokest_tipas}} - {{$keleivis->kaina}}<br>
    @endforeach
</x-app-layout>