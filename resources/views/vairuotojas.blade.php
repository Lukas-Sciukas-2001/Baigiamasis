<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div>
        <form method='POST' action="{{route('vairuotregister.update',$vairuotojas->id)}}">
            @csrf
            @method('PUT')
            <div class="overflow-hidden m-5 bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-base font-semibold leading-6 text-gray-900"><input name="name" id="name" type='text' value = '{{$vairuotojas->name}}'> <input name="pavarde" id="pavarde" type='text' value = '{{$vairuotojas->pavarde}}'></h3>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-900">Telefonas</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"><input name="telefonas" id="telefonas" type='text' value = '{{$vairuotojas->telefonas}}' default='{{$vairuotojas->telefonas}}'></dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-900">El. paštas</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0"><input name="email" id="email" type='text' value = '{{$vairuotojas->email}}' default='{{$vairuotojas->email}}'></dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-900">Pridėta</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$vairuotojas->created_at}}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-900">Keista</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$vairuotojas->updated_at}}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-900"><input class='btn-success rounded-lg p-0.5' type='submit' value="Išsaugoti"></dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    </div>
                    </dl>
                </div>
            </form>
            <form action="{{ route('vairuotregister.destroy',$vairuotojas->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Panaikinti" class="border-2 bg-red-600 p-2 m-2 rounded-lg">
                        </form>
        </div>
    </div>
</x-app-layout>