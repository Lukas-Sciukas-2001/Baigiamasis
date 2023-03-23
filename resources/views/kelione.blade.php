<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div>
        @foreach($keliones as $kelione)
        <div>
            {{$kelione->aprasymas}}
        </div>
        @endforeach
    </div>
</x-app-layout>