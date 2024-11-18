@extends('layouts.app')
@section('content')
   <div class="xl:mx-96 w-1/2 flex gap-20">
      <img src="{{ asset('img/contestants/tall/'.$contestant->photo_path.'-tall.png')}}" alt="" class="self-start">
      <div>
         <x-nav-link href="{{ route('event.index') }}">
            <x-svg name="chevron_left" />Back to Events
         </x-nav-link>
         <x-contestant-name class="xl:mt-10 md:mt-5">{{ ucwords($contestant->name) }}</x-contestant-name>
         <x-header-title class="xl:mb-10 md:mb-5 text-xl text-gray-400">{{ ucwords($event->name) }}</x-header-title>

         <div class="h-[38.5rem] flex flex-col justify-between">
            <form method="POST" class="grid gap-10" action="{{ route('score.store') }}">
               @csrf
               <input type="hidden" name="event_id" value="{{ $event->id }}">
               <input type="hidden" name="contestant_id" value="{{ $contestant->id }}">

               <div class="grid grid-cols-2 gap-x-10 gap-y-6 h-100 content-center">
                  @foreach ($criterias as $criteria)
                     <div>
                        <x-input-label class="text-lg"> {{ ucwords($criteria->criteria) }}</x-input-label>
                        <x-text-input name="{{ $criteria->id }}" value="{{ $criteria->score }}" class="md:w-48" />
                     </div>
                  @endforeach
               </div>
               <div class="flex w-full justify-center">
                  <x-primary-button class="w-fit {{ session()->has('msg') ? 'bg-green-800' : '' }}">
                     {{ session()->has('msg') ? session()->get('msg') : 'Submit' }}
                  </x-primary-button>
               </div>
            </form>
            <div class="flex justify-between w-full pb-10">
               <a href="{{ route('event.score', [$event->id, $photo_prev = $contestant->id == 1 ? $contestant->max : $contestant->id - 1]) }}"
                  class="w-52 flex flex-col items-center">
                  <p class="text-sm text-gray-600 pb-2">{{ ucwords($contestant->prev->name) }}</p>
                  <img src="{{ asset('img/contestants/sq/'.$contestant->prev->photo_path.'-sq.png')}}"
                  class="w-32 rounded-md"
                  alt="{{ucwords($contestant->prev->name)}}">
               </a>
               <a href="{{ route('event.score', [$event->id, $photo_next = $contestant->id == $contestant->max ? 1 : $contestant->id + 1]) }}"
                  class="w-52 flex flex-col items-center">
                  <p class="text-sm text-gray-600 pb-2">{{ ucwords($contestant->next->name) }}</p>
                  <img src="{{ asset('img/contestants/sq/'.$contestant->next->photo_path.'-sq.png')}}"
                    class="w-32 rounded-md"
                    alt="{{ucwords($contestant->next->name)}}">
               </a>
            </div>
         </div>
      </div>
   </div>
@endsection
