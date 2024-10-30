@extends('layouts.app')

@section('content')
   <x-header-title class="mt-10">{{ ucwords($event->name) }}</x-header-title>
   <div class="m-10 grid grid-cols-6 gap-5">
      @foreach ($contestants as $contestant)
      <x-contestant-event
        link="#"
        name="{{$contestant->name}}"
        team="{{$contestant->group_name}}"
        color="{{$contestant->color}}"
        />
      @endforeach
   </div>
@endsection
