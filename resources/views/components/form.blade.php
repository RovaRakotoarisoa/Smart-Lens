@props(
        [
            'enctype' => false,
            'method' => 'POST',
            'isPost'=> true
        ]
    )
@php
    if ($enctype){
        $enctype ="multipart/form-data";
    }
    if ($isPost !== true){
        $isPost ="PUT";
    }
@endphp

{{--A Revoir si :enctype="rien VIDE" ou :enctype="justeTexte" mais pas de true ou false  ERREUR--}}

<form {{ $attributes->merge(['method' => $method,'enctype' => $enctype]) }} >
    @csrf
    @method($isPost)

    {{ $slot }}
</form>