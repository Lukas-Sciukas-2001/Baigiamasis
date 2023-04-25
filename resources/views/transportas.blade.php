<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div>
        <a class="btn btn-info" href="{{route('transportas.create')}}">Pridėti transporto priemonę</a>
        @foreach($transportas as $automobilis)
        <div class="overflow-hidden m-5 bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">{{$automobilis->modelis}}<h3>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-900">Valstybiniai numeriai</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$automobilis->identif}}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-900">Max vietos</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$automobilis->vietos}}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <form method="GET" action="{{route('transportas.edit',$automobilis->id)}}">
                        @csrf
                        <input type="submit" value = "Redaguoti" class="btn btn-info">
                    </form>
                </div>
                </dl>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>