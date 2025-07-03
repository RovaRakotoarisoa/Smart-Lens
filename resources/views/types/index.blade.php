<x-layout>
    This is index TYPE
    @foreach ($types as $type)
        <div class=" text-blue-400">{{ $type->type }}</div>
    @endforeach
</x-layout>