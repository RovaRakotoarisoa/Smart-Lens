<x-layout>
    <section class="herosection">
        Herosection
    </section>
    <section class="about">
        About
    </section>
    <section class="service">
        Services
        @foreach ($colors as $color)
            <div class=" font-extrabold">{{ $color->color_name }}</div>
        @endforeach
    </section>
</x-layout>