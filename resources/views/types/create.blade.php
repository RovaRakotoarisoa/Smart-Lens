<x-layout>
    <div>This is Creation Page</div>
    <form action="{{ route('types.store') }}" method="POST" id="formType">
        @csrf
        @method('POST')

        <div>
            <label for="type">Name: </label>
            <input type="text" name="type" id="name" class="">
        </div>

        <button>Valider</button>
    </form>
</x-layout>