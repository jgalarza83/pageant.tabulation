@php
   $photos = [
       // https://placehold.co/300x600 -- NULL
       'photogenic' => 'photogenic.png',
       'congeniality' => null,
       'people choice' => null,
       'creative jeans' => 'creative-jeans.png',
       'production' => 'production.png',
       'sport' => 'sport-attire.png',
       'evening' => 'evening-gown.png',
       'picture analysis' => null,
   ];
@endphp
@extends('layouts.app')

@section('content')
   <x-header-title class="my-10">Categories</x-header-title>
   <div class="grid grid-cols-6 px-24 gap-10 mb-8">
      @foreach ($events as $event)
         <x-category
            title="{{ ucwords($event->name) }}"
            image="{{ $photos[$event->name] == null ? 'https://placehold.co/300x600' : asset('/img/' . $photos[$event->name]) }}"
            link="{{ route('event.contestants', $event->id) }}"
            {{-- class="" --}}
         />

      @endforeach
   </div>
@endsection
