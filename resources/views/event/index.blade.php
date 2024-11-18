@extends('layouts.app')
@section('content')
   <x-header-title class="xl:my-10 md:my-4">Events</x-header-title>
   <div class="grid xl:grid-cols-5 md:grid-cols-3 xl:px-24 md:px-52 xl:gap-10 md:gap-7 justify-evenly">
      @foreach ($events as $event)
         <x-category
            title="{{ ucwords($event->name) }}"
            image="{{ asset('img/events/'.$event->photo_path.'.jpg')}}"
            link="{{ route('event.contestants', $event->id) }}"
         />
      @endforeach
   </div>
@endsection
