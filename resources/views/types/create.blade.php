<x-layout>
    <div>This is Creation Page</div>
    <form action="{{ route('types.store') }}" method="POST" id="formType">
        @csrf
        @method('POST')

        <div>
            <label for="name">Name: </label>
            <input type="text" name="name" id="name" class="">
        </div>
    </form>
</x-layout>