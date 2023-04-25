
<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div>
        <form method="PUT" action="{{route('transportas.update',$transportas->id)}}">
            @method('PUT')
            @csrf
            <!-- pradzia šalis -->
            
            <div class="mt-4">
                <x-input-label for="modelis" :value="__('Modelis')" />
                <x-text-input id="modelis" class="block mt-1 w-full" type="text" name="modelis" value="{{$transportas->modelis}}" required />
            </div>
            <div class="mt-4">
                <x-input-label for="identif" :value="__('Valstybiniai numeriai')" />
                <x-text-input id="identif" class="block mt-1 w-full" type="text" name="identif" value="{{$transportas->identif}}" required />
            </div>
            <div class="mt-4">
                <x-input-label for="vietos" :value="__('Max vietos')" />
                <input id="vietos" class="block mt-1 w-full" type="number" name="vietos" value="{{$transportas->vietos}}" required />
            </div>
            <div>
                <input type="submit" value="Patvirtinti" class="border-2 bg-green-700 p-2 m-2 border-green-600 rounded-lg">
            </div>
        </form>
        <form action="{{ route('transportas.destroy',$transportas->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Panaikinti" class="border-2 bg-red-600 p-2 m-2 border-green-600 rounded-lg">
        </form>

    </div>
</x-app-layout>