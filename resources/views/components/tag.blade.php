@props(['tag'])

<a href="/tags/{{ strtolower($tag->name) }}">{{ $tag->name }}</a>
