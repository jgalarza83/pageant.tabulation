@extends('layouts.app')
@section('content')
   <div class="mx-96 flex gap-20">
      <img src="https://placehold.co/300x700" alt="">
      <div>
         <x-header-title class="mt-10">{{ ucwords($contestant->name) }}</x-header-title>
         <x-header-title class="mb-10 text-3xl text-gray-400">{{ ucwords($event->name) }}</x-header-title>

         <form method="POST" class="grid grid-cols-2 gap-10 h-100 content-center" action="{{ route('score.store') }}">
            @csrf
            <input type="hidden" name="event_id" value="{{$event->id}}">
            <input type="hidden" name="contestant_id" value="{{$contestant->id}}">

            @foreach ($criterias as $criteria)
               <div>
                  <x-input-label class="text-lg"> {{ ucwords($criteria->criteria) }}</x-input-label>
                  <x-text-input name="{{$criteria->id}}" value="{{$criteria->score?:''}}" />
               </div>
            @endforeach
            <div class="flex w-full gap-x-5">
               <x-primary-button class="w-full h-fit place-self-end"> Submit </x-primary-button>
               <x-secondary-button type="submit" class="h-fit place-self-end" formaction="{{ route('event.index') }}"> X
               </x-secondary-button>
            </div>
         </form>
         <div class="flex justify-between mt-20">
            <a href="{{route('event.score', [$event->id, $contestant->id == 1 ? $contestant->max : $contestant->id-1])}}"
                class="w-fit flex flex-col items-center">
               <img src="https://placehold.co/300x300" alt="" class="w-32">
               <p>{{ ucwords($contestant->prev->name) }}</p>
            </a>
            <a href="{{route('event.score', [$event->id, $contestant->id == $contestant->max ? 1 : $contestant->id+1])}}"
                class="w-fit flex flex-col items-center">
               <img src="https://placehold.co/300x300" alt="" class="w-32">
               <p>{{ ucwords($contestant->next->name) }}</p>
            </a>
         </div>
      </div>
   </div>
@endsection
