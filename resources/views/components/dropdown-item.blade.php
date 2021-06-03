@props(['active' => false])

@php
    $classes = "block text-left px-3 text-sm leading-6 hover:bg-yellow-600 focus:bg-bg-yellow-600 hover:text-white focus:text-white";
    if($active) {
        $classes .= " bg-yellow-600 text-white";
    }
@endphp

<a
    {{$attributes->merge(["class" => $classes])}}>
    {{$slot}}
</a>
