<x-layout>
    <x-ui.sidebar />
    <x-container>
        <x-form action="{{ route('lunettes.store') }}" :enctype="true" id="formType">
            <div class="bg-red-200">
                <div class="grid grid-cols-2 gap-4">
                    <div class="p-4 bg-white">
                        <h2 class=" font-bold text-gray-500 text-xl mb-4">Description</h2>
                        <div class="mb-4">
                            <x-label for="name">Name: </x-label>
                            <x-input type="text" name="name" id="name" class="w-full" />
                        </div>
                        <div>
                            <x-label for="description">Description: </x-label>
                            <x-input type="text" name="description" id="description" class="w-full" />
                        </div>
                    </div>
                    <div class="bg-white p-4">
                        <h2 class=" font-bold text-gray-500 text-xl mb-4">Details</h2>
                        <div class="mb-4">
                            <x-label for="quantity">Quantity:</x-label>
                            <x-input type="number" name="quantity" id="quantity" class="w-full" />
                        </div>
                        <div class="mb-4">
                            <x-label for="price">Price:</x-label>
                            <x-input type="number" name="price" id="price" class="w-full" />
                        </div>
                        
                        <div class="mb-4">
                            <x-label for="type_id">Type: </x-label>
                            <select name="type_id" id="" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm input-custom w-full">
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <h4>Couleurs disponibles :</h4>
                            @foreach($colors as $color)
                                <x-label>
                                    {{ $color->color_name }}
                                    <x-input type="checkbox" name="colors[]" value="{{ $color->id }}" />
                                </x-label>
                            @endforeach
                        </div>
                    </div>
                </div>
    
                <div class="grid grid-cols-1">
                    <div>
                        <h2>Frame</h2>
                    </div>
                </div>
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
        </x-form>
    </x-container>
</x-layout>