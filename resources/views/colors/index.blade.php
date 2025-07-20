<x-layout>
    <x-ui.sidebar />
    <x-container>
        @foreach ($colors as $color)
            <div class=" font-extrabold">{{ $color->color_name }}</div>
        @endforeach
    </x-container>
</x-layout>