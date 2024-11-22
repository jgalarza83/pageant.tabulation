@extends('layouts.app')
@section('content')
   <div class="flex w-fill justify-center">
      <x-nav-link href="{{ route('event.index') }}">
         <x-svg name="chevron_left" />
         Back to Events
      </x-nav-link>
   </div>
   <x-header-title class="my-10">{{ ucwords($event->name) }}</x-header-title>
   <form method="POST" action="{{ route('score.photogenic') }}">
      @csrf
      <input type="hidden" name="event" value="{{ $event->id }}">
      <div class="flex w-full justify-center">
         <x-primary-button class="w-fit {{ session()->has('msg') ? 'bg-green-800' : '' }}">
            {{ session()->has('msg') ? session()->get('msg') : 'Submit' }}
         </x-primary-button>
      </div>
      <div
         class="m-10 xl:px-52 md:px-20 portrait:px-0 grid xl:grid-cols-3 md:grid-cols-2 md:gap-10 justify-items-center gap-y-24">
         @foreach ($contestants as $contestant)
            <x-photogenic-photo
                image="{{ asset('img/photogenic/' . $contestant->photo_path . '-photogenic.png') }}"
                name="contestant"
                alt="{{ $contestant->name }}"
                value="{{ $contestant->id }}"
                team="{{ $contestant->group_name }}"
                color="{{ $contestant->color }}"
                check="{{$photogenic->contestant_id == $contestant->id ? 'checked' : ' '}}"
                     />
         @endforeach
      </div>
   </form>
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
