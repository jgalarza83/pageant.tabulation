@extends('layouts.app')
@section('content')
<div class="flex w-fill justify-center">
    <x-nav-link href="{{ route('event.index') }}">
        <x-svg name="chevron_left" />
        Back to Events
    </x-nav-link>
</div>
    <x-header-title class="my-10">{{ ucwords($event->name) }}</x-header-title>
    <div class="m-10 grid xl:grid-cols-6 md:grid-cols-4 portrait:grid-cols-3 gap-5">
    @foreach ($contestants as $contestant)
        <x-contestant-event link="{{ route('event.score', [$event->id, $contestant->id]) }}"
            image="{{ asset('img/contestants/sq/'.$contestant->photo_path.'-sq.png') }}"
            name="{{ $contestant->name }}" team="{{ $contestant->group_name }}"
            color="{{ $contestant->color }}" />
    @endforeach
    </div>
@endsection
