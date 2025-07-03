<x-layout>
    <div>This is Creation Page</div>
    <form action="{{ route('lunettes.store') }}" method="POST" enctype="multipart/form-data" id="formType">
        @csrf
        @method('POST')

        <div>
            <label for="name">Name: </label>
            <input type="text" name="name" id="name" class="">
        </div>
        <div>
            <label for="price">Price: </label>
            <input type="number" name="price" id="price" class="">
        </div>
        <div>
            <label for="description">Description: </label>
            <input type="text" name="description" id="description" class="">
        </div>
        <div>
            <label for="type_id">Type: </label>
            {{-- <input type="number" name="price" id="price" class=""> --}}
            <select name="type_id" id="">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->type }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="frameWidth">Frame Width: </label>
            <input type="number" name="frameWidth" id="frameWidth" class="">
        </div>
        <div>
            <label for="lensWidth">Lens Width: </label>
            <input type="number" name="lensWidth" id="lensWidth" class="">
        </div>
        <div>
            <label for="bridgeWidth">Bridge Width: </label>
            <input type="number" name="bridgeWidth" id="bridgeWidth" class="">
        </div>
        <div>
            <label for="templeWidth">Temple Width: </label>
            <input type="number" name="templeWidth" id="templeWidth" class="">
        </div>
        <div>
            <label for="primaryimage">Primary frame: </label>
            <input type="file" name="primaryimage" id="primaryimage" class="">
        </div>
        <div>
            <label for="secondaryimage">Secondary frame: </label>
            <input type="file" name="secondaryimage" id="secondaryimage" class="">
        </div>
        <div>
            <label for="tertiaryimage">Tertiary frame: </label>
            <input type="file" name="tertiaryimage" id="tertiaryimage" class="">
        </div>
        <div>
            <label for="quadriimage">Quaternary frame: </label>
            <input type="file" name="quadriimage" id="quadriimage" class="">
        </div>
        <button>Valider</button>
    </form>
</x-layout>