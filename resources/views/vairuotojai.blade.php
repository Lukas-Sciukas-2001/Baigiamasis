<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <a class="btn-success rounded-lg p-0.5" href="{{route('vairuotregister.index')}}">Prideti</a>
    <div>
        @foreach($vairuotojai as $vairuotojas)
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
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-12 sm:gap-4 sm:px-6">
                    <a class="btn-info rounded-lg p-0.5" href="{{route('vairuotregister.edit',$vairuotojas->id)}}">Redaguoti</a>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                </div>
                </dl>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>