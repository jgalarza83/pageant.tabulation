@extends('layouts.app')
@section('content')
<div class="flex w-fill justify-center">
    <x-nav-link href="{{ route('event.index') }}">
        <x-svg name="chevron_left" />
        Back to Events
    </x-nav-link>
</div>
    <x-header-title class="my-10">{{ ucwords($event->name) }}</x-header-title>
    <div class="m-10 grid xl:grid-cols-6 md:grid-cols-4 gap-5">
    @foreach ($contestants as $contestant)
        <x-photogenic-photo link="{{ route('event.score', [$event->id, $contestant->id]) }}"
            image="https://placehold.co/300x600"
            {{-- {{ asset('img/photogenic/'.$contestant->photo_path.'.png') }} --}}
            name="{{ $contestant->name }}" team="{{ $contestant->group_name }}"
            color="{{ $contestant->color }}" />
    @endforeach
    </div>
@endsection