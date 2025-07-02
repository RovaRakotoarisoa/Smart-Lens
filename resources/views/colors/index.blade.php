<x-layout>
    @foreach ($colors as $color)
        <div class=" font-extrabold">{{ $color->color_name }}</div>
    @endforeach
</x-layout>