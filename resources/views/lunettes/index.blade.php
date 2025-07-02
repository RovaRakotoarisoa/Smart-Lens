<x-layout>
    @foreach ($lunettes as $lunette)
        <div class=" font-extrabold">{{ $lunette->name }}</div>
    @endforeach
</x-layout>