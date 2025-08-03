{{-- <x-layout>
    <x-ui.sidebar />
    <x-container>
        <x-form action="{{ route('lunettes.store') }}" :isPost="true" :enctype="true" id="formType">
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
                            <textarea name="description" id="description" cols="30" rows="10">
                            </textarea>
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
                            @foreach ($types as $type)
                                <x-label>
                                    {{ $type->type }}
                                    <input type="radio" name="type_id" value="{{$type->id}}">
                                </x-label>
                            @endforeach
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
                        <h2>Dimension</h2>
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
</x-layout> --}}

<x-layout>
    <x-ui.sidebar />
    <x-container>
        <x-form action="{{ route('lunettes.store') }}" :isPost="true" :enctype="true" id="formType">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-white rounded-xl shadow-md p-5">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">📝 Description</h2>

                    <div class="mb-4">
                        <x-label for="name" class="text-sm font-medium text-gray-800">Nom</x-label>
                        <x-input type="text" name="name" id="name" class="mt-1 w-full text-sm px-3 py-2 border-gray-300 rounded-md focus:ring-blue-500" />
                        <x-input-error for="name" />
                    </div>

                    <div>
                        <x-label for="description" class="text-sm font-medium text-gray-800">Description</x-label>
                        <textarea name="description" id="description" rows="4"
                            class="mt-1 w-full text-sm px-3 py-2 border border-gray-300 rounded-md resize-none focus:ring-2 focus:ring-blue-300 focus:outline-none"></textarea>
                        <x-input-error for="description" />
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-5">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">📋 Détails</h2>

                    <div class="space-y-4 mb-4">
                        <div>
                            <x-label for="quantity" class="text-sm font-medium text-gray-800">Quantité</x-label>
                            <x-input type="number" name="quantity" id="quantity" class="mt-1 w-full px-3 py-2 border-gray-300 rounded-md" />
                            <x-input-error for="quantity" />
                        </div>
                        <div>
                            <x-label for="price" class="text-sm font-medium text-gray-800">Prix</x-label>
                            <x-input type="number" name="price" id="price" class="mt-1 w-full px-3 py-2 border-gray-300 rounded-md" />
                            <x-input-error for="price" />
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="text-sm font-medium text-gray-800 mb-2">Type</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($types as $type)
                                <label class="inline-flex items-center px-3 py-1 border border-gray-300 rounded-lg cursor-pointer hover:bg-blue-50">
                                    <input type="radio" name="type_id" value="{{ $type->id }}" class="accent-blue-600 mr-2">
                                    <span class="text-sm text-gray-700">{{ $type->type }}</span>
                                </label>
                                <x-input-error for="type_id" />
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-800 mb-2">Couleurs</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($colors as $color)
                                <label class="inline-flex items-center px-3 py-1 border border-gray-300 rounded-lg cursor-pointer hover:bg-green-50">
                                    <input type="checkbox" name="colors[]" value="{{ $color->id }}" class="accent-green-600 mr-2">
                                    <span class="text-sm text-gray-700">{{ $color->color_name }}</span>
                                </label>
                                 {{-- <x-input-error for="type_id" /> --}}
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-5">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">📐 Dimensions</h2>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach ([
                            'frameWidth' => 'Monture',
                            'lensWidth' => 'Verre',
                            'bridgeWidth' => 'Pont',
                            'templeWidth' => 'Branche'
                        ] as $field => $label)
                            <div>
                                <x-label for="{{ $field }}" class="text-sm font-medium text-gray-800">{{ $label }}</x-label>
                                <x-input type="number" name="{{ $field }}" id="{{ $field }}"
                                    class="mt-1 w-full px-3 py-2 border-gray-300 rounded-md" />
                                <x-input-error for="{{ $field }}" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- 🖼️ Images --}}
            <div class="mt-6 bg-white rounded-xl shadow-md p-5">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">🖼️ Images</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach ([
                        'primaryimage' => 'Principale',
                        'secondaryimage' => 'Secondaire',
                        'tertiaryimage' => 'Tertiaire',
                        'quadriimage' => 'Quaternaire'
                    ] as $id => $label)
                        <div>
                            <x-label for="{{ $id }}" class="text-sm font-medium text-gray-800">{{ $label }}</x-label>
                            <input type="file" name="{{ $id }}" id="{{ $id }}"
                                class="mt-1 w-full text-sm file:text-gray-600 file:py-1 file:px-2 border border-gray-300 rounded-md"
                                onchange="previewImage(this)">
                            <x-input-error for="{{ $id }}" />
                            <img id="{{ $id }}_preview" class="mt-2 w-full h-32 object-cover rounded hidden" />
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- ✅ Bouton --}}
            <div class="text-right mt-6">
                <button type="submit"
                    class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white font-semibold px-6 py-2 rounded-lg shadow-sm transition">
                    ✅ <span>Valider</span>
                </button>
            </div>
        </x-form>
    </x-container>

    <script>
        function previewImage(input) {
            const preview = document.getElementById(`${input.id}_preview`);
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.classList.add('hidden');
            }
        }
    </script>
</x-layout>