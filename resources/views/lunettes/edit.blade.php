<x-layout>
    <div>Lunette Edit page</div>
    <form action="{{ route('lunettes.update' , $lunette->id) }}" method="POST" enctype="multipart/form-data" id="formType">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name: </label>
            <input type="text" name="name" value="{{ $lunette->name }}" id="name" class="">
        </div>
        <div>
            <label for="quantity">Quantity: </label>
            <input type="number" name="quantity" value="{{ $lunette->quantity }}" id="quantity" class="">
        </div>
        <div>
            <label for="price">Price: </label>
            <input type="number" name="price" value="{{ $lunette->price }}" id="price" class="">
        </div>
        <div>
            <label for="description">Description: </label>
            <input type="text" name="description" value="{{ $lunette->description }}" id="description" class="">
        </div>
        <div>
            <label for="type_id">Type: </label>
            <select name="type_id" id="">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->type }}</option>
                @endforeach
            </select>
        </div>
        <div>
             <h4>Couleurs disponibles :</h4>
            @foreach($colors as $color)
                <label>
                    <input type="checkbox" name="colors[]" value="{{ $color->id }}">
                    {{ $color->color_name }}
                </label><br>
            @endforeach
        </div>
        <div>
            <label for="frameWidth">Frame Width: </label>
            <input type="number" name="frameWidth" value="{{ $lunette->frameWidth }}" id="frameWidth" class="">
        </div>
        <div>
            <label for="lensWidth">Lens Width: </label>
            <input type="number" name="lensWidth" value="{{ $lunette->lensWidth }}" id="lensWidth" class="">
        </div>
        <div>
            <label for="bridgeWidth">Bridge Width: </label>
            <input type="number" name="bridgeWidth" value="{{ $lunette->bridgeWidth }}" id="bridgeWidth" class="">
        </div>
        <div>
            <label for="templeWidth">Temple Width: </label>
            <input type="number" name="templeWidth" value="{{ $lunette->templeWidth }}" id="templeWidth" class="">
        </div>
        <div>
            <label for="primaryimage">Primary frame: </label>
            <input type="file" name="primaryimage" value="{{ $lunette->primaryimage }}" id="primaryimage" class="">
        </div>
        <div>
            <label for="secondaryimage">Secondary frame: </label>
            <input type="file" name="secondaryimage" value="{{ $lunette->secondaryimage }}" id="secondaryimage" class="">
        </div>
        <div>
            <label for="tertiaryimage">Tertiary frame: </label>
            <input type="file" name="tertiaryimage" value="{{ $lunette->tertiaryimage }}" id="tertiaryimage" class="">
        </div>
        <div>
            <label for="quadriimage">Quaternary frame: </label> 
            <input type="file" name="quadriimage" value="{{ $lunette->quadriimage }}" id="quadriimage" class="">
        </div>
        <button>Valider</button>
    </form>
</x-layout>