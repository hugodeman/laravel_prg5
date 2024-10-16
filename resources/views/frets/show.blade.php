@props(['frets'])

@php

    /**
     * @var \App\Models\Frets $frets
     */

@endphp

<x-layout>
    <x-fret :fret="$frets"/>
    <form action="{{ url(route('frets.destroy', $frets)) }}" method="POST">
        @method('DELETE')

        <button type="submit">Submit</button>
    </form>
</x-layout>
