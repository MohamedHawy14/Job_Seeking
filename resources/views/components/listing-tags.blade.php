@props(['tagsCsv'])

@php
    $tags = explode(' ', $tagsCsv);
@endphp

<ul class="flex flex-wrap gap-2">
    @foreach ($tags as $tag)
        <li class="bg-slate-800 text-white rounded-lg py-1 px-3 text-xs font-medium hover:bg-primary transition-colors">
            <a href="/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
    @endforeach
</ul>
