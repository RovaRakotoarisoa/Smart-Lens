<x-layout>
    <div> This is the CREATE VIEW FOR COLOR</div>
    <div>
        <form action="{{ route('colors.store') }}" method="POST" id="formColor">
            @csrf
            @method('POST')
            <div>
                <label id="color_name" for="color_name">Color name</label>
                <input type="text" name="color_name">
            </div>
            <div>
                <label for="code_color">Code </label>
                <input type="text" name="code_color">
            </div>

            <div>
                <input type="submit" value="Valider">
            </div>
            
        </form>
    </div>
</x-layout>