@extends('layouts.app')

@section('content')
   <x-header-title class="my-10">{{ ucwords($event->name) }}</x-header-title>
   <div class="m-10 grid grid-cols-6 gap-5">
      @foreach ($contestants as $contestant)
        <x-contestant-event
            link="{{ route('event.score', [$event->id, $contestant->id]) }}"
            image="https://placehold.co/300x300"
            name="{{ $contestant->name }}"
            team="{{ $contestant->group_name }}"
            color="{{ $contestant->color }}"
        />
      @endforeach
   </div>
@endsection
