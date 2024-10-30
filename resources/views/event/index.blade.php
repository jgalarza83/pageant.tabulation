@extends('layouts.app')

@section('content')
<x-header-title class="mt-10">Categories</x-header-title>
<div class="grid grid-cols-6 px-24 gap-10">
    @foreach ($events as $event)
        <x-category
            title="{{ucwords($event->name)}}"
            image="https://placehold.co/300x600"
            link="{{route('event.contestants',$event->id)}}"
        />
    @endforeach
</div>

@endsection
