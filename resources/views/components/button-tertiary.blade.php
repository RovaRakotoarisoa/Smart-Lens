<button {{ $attributes->merge(['type' => 'button', 'class' => 'tertiary-button']) }}>
    {{ $slot }}
</button>