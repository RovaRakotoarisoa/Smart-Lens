<x-layout>
    <div>This is index For User</div>
    <div>
        @foreach ($users as $user)
            <div>{{ $user->name }}</div>
        @endforeach
    </div>
</x-layout>