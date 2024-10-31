@extends('layouts.app')

@section('content')
   <div class="mx-96 flex gap-20">
      <img src="https://placehold.co/300x700" alt="">
      <div>
         <x-header-title class="mt-10">{{ ucwords($contestant->name) }}</x-header-title>
         <x-header-title class="mb-10 text-3xl text-slate-600">{{ ucwords($event->name) }}</x-header-title>

         <form class="grid grid-cols-2 gap-10 h-100 content-center" action="{{route('event.submit')}}">
            @csrf
            @foreach ($criterias as $criteria)
               <div>
                  <x-input-label class="text-lg"> {{ ucwords($criteria->criteria) }}</x-input-label>
                  <x-text-input />
               </div>
            @endforeach
            <div class="flex w-full gap-x-5">
               <x-primary-button class="w-full h-fit place-self-end"> Submit </x-primary-button>
               <x-secondary-button type="submit" class="h-fit place-self-end" formaction="{{route('event.index')}}"> X </x-secondary-button>
            </div>
         </form>
      </div>
   </div>
@endsection
