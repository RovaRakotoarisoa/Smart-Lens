<x-layout>
    <x-ui.sidebar />
    <x-container>
        @foreach ($types as $type)
            <div class=" text-blue-400">{{ $type->type }}</div>
        @endforeach
    </x-container>
</x-layout>