@extends('layouts.app')
@section('content')
   <x-header-title class="my-10">Events</x-header-title>
   <div class="grid xl:grid-cols-5 max-lg:grid-cols-4 px-24 gap-10 justify-center">
      @foreach ($events as $event)
         <x-category
            title="{{ ucwords($event->name) }}"
            image="{{ asset('img/events/'.$event->photo_path.'.jpg')}}"
            link="{{ route('event.contestants', $event->id) }}"
         />
      @endforeach
   </div>
@endsection
