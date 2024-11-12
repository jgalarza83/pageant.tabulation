@php
   $photos = [
       // https://placehold.co/300x600 -- NULL
       'photogenic' => 'photogenic.jpg',
       'congeniality' => 'congeniality.jpg',
       'people choice' => 'people-choice.jpg',
       'creative jeans' => 'jeans.jpg',
       'production' => 'production.jpg',
       'sport' => 'sport.jpg',
       'evening' => 'evening.jpg',
       'picture analysis' => 'picture-analysis.jpg',
   ];
@endphp
@extends('layouts.app')

@section('content')
   <x-header-title class="my-10">Events</x-header-title>
   <div class="grid xl:grid-cols-6 max-lg:grid-cols-4 px-24 gap-10">
      @foreach ($events as $event)
         <x-category
            title="{{ ucwords($event->name) }}"
            image="{{ $photos[$event->name] == null ? 'https://placehold.co/300x500' : asset('/img/events/' . $photos[$event->name]) }}"
            link="{{ route('event.contestants', $event->id) }}"
         />
      @endforeach
   </div>
@endsection
