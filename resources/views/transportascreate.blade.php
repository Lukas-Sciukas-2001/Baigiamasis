
<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div>
        <form method="POST" action="{{route('transportas.store')}}">
            @csrf
            <!-- Modelis -->
            <div class="mt-4">
                <x-input-label for="modelis" :value="__('Modelis')" />
                <x-text-input id="modelis" class="block mt-1 w-full" type="text" name="modelis" :value="old('modelis')" required />
            </div>
            <!-- Valstybiniai numeriai -->
            <div class="mt-4">
                <x-input-label for="identif" :value="__('Valstybiniai numeriai')" />
                <x-text-input id="identif" class="block mt-1 w-full" type="text" name="identif" :value="old('identif')" required />
            </div>
            <!-- Max vietos -->
            <div class="mt-4">
                <x-input-label for="vietos" :value="__('Max vietos')" />
                <input id="vietos" class="block mt-1 w-full" type="number" name="vietos" :value="old('vietos')" required />
            </div>
            <div>
                <input type="submit" value="Išsaugoti" class="border-2 p-0.5 rounded-lg cursor:auto">
            </div>

        </form>
    </div>
</x-app-layout>