<x-layout>
    <div>Edit form color</div>
    <form action="{{ route('colors.update', $color->id) }}" method="POST">
		@csrf
		@method('PUT')

        <div>
            <label id="color_name" for="color_name">Color name</label>
            <input type="text" name="color_name" value="{{ $color->color_name }}">
        </div>
        <div>
        <label for="code_color">Code </label>
            <input type="text" name="code_color" value="{{ $color->code_color }}">
        </div>

        <div>
            <input type="submit" value="Valider">
        </div>
    </form>
</x-layout>