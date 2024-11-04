@extends('layouts.app')
@section('content')
   <div class="mx-96 w-1/2 flex gap-20">
      <img src="https://placehold.co/300x800" alt="" class="bg-green-500 self-start">
      <div>
         <x-nav-link href="{{ route('event.index') }}">
            <x-svg name="chevron_left" />Back to Events
         </x-nav-link>
         <x-header-title class="mt-10 text-4xl">{{ ucwords($contestant->name) }}</x-header-title>
         <x-header-title class="mb-10 text-xl text-gray-400">{{ ucwords($event->name) }}</x-header-title>

         <form method="POST" class="grid gap-10" action="{{ route('score.store') }}">
            @csrf
            <input type="hidden" name="event_id" value="{{ $event->id }}">
            <input type="hidden" name="contestant_id" value="{{ $contestant->id }}">

            <div class="grid grid-cols-2 gap-10 h-100 content-center">
               @foreach ($criterias as $criteria)
                  <div>
                     <x-input-label class="text-lg"> {{ ucwords($criteria->criteria) }}</x-input-label>
                     <x-text-input name="{{ $criteria->id }}" value="{{ $criteria->score ?: '' }}" />
                  </div>
               @endforeach
            </div>
            <div class="flex w-full justify-center">
               <x-primary-button class="w-fit"> Submit </x-primary-button>
            </div>
         </form>
         <div class="flex justify-between mt-20">
            <a href="{{ route('event.score', [$event->id, $contestant->id == 1 ? $contestant->max : $contestant->id - 1]) }}"
               class="w-fit flex flex-col items-center">
               <p class="text-sm text-gray-600 pb-2">{{ ucwords($contestant->prev->name) }}</p>
               <img src="https://placehold.co/300x300" alt="" class="w-32">
            </a>
            <a href="{{ route('event.score', [$event->id, $contestant->id == $contestant->max ? 1 : $contestant->id + 1]) }}"
               class="w-fit flex flex-col items-center">
               <p class="text-sm text-gray-600 pb-2">{{ ucwords($contestant->next->name) }}</p>
               <img src="https://placehold.co/300x300" alt="" class="w-32">
            </a>
         </div>
      </div>
   </div>
@endsection
