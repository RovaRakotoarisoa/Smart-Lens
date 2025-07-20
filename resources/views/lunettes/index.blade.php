<x-layout>
    <x-ui.sidebar />
    <x-container>
        @foreach ($lunettes as $lunette)
            <div class=" font-extrabold">{{ $lunette->name }}</div>
        @endforeach
    </x-container>
</x-layout>