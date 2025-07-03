<x-layout>
    <div>This is Creation Page</div>
    <form action="{{ route('types.update', $type->id) }}" method="POST" id="formType">
        @csrf
        @method('PUT')

        <div>
            <label for="type">Name: </label>
            <input type="text" name="type" value="{{ $type->type }}" id="name" class="">
        </div>

        <button>Valider</button>
    </form>
</x-layout>