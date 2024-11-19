@extends('layouts.app')
@section('content')
   <div class="flex w-fill justify-center">
      <x-nav-link href="{{ route('event.index') }}">
         <x-svg name="chevron_left" />
         Back to Events
      </x-nav-link>
   </div>
   <x-header-title class="my-10">{{ ucwords($event->name) }}</x-header-title>
   <div class="m-10 px-52 grid xl:grid-cols-3 md:grid-cols-3 justify-items-center gap-y-24">
      @foreach ($contestants as $contestant)
         <x-photogenic-photo
            image="{{ asset('img/photogenic/' . $contestant->photo_path . '-photogenic.png') }}"
            name="{{ $contestant->name }}"
            team="{{ $contestant->group_name }}"
            color="{{ $contestant->color }}"
        />
      @endforeach
   </div>
   <div class="flex w-full justify-center">
      <x-primary-button class="w-fit {{ session()->has('msg') ? 'bg-green-800' : '' }}">
         {{ session()->has('msg') ? session()->get('msg') : 'Submit' }}
      </x-primary-button>
   </div>
@endsection

<style>
   [type=radio] {
      position: absolute;
      opacity: 0;
      width: 0;
      height: 0;
   }

   [type=radio]+img {
      cursor: pointer;
   }

   [type=radio]:checked+img {
      outline: 6px solid purple;
      box-shadow: 0px 10px 15px #aaaaaa;
   }
</style>
