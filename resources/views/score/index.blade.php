@push('meta')
   <meta http-equiv="refresh" content="30">
@endpush

@extends('layouts.app')
@section('content')
   <x-header-title class="mt-10">Scores</x-header-title>
   <div class="flex mt-2 gap-5 border border-gray-300 text-dark text-sm w-fit mx-auto px-5 py-1 rounded-md">
      <span class="text-gray-300">|</span>
      @foreach ($judges as $judge)
         <label class=" text-gray-500">{{ $judge->name }}</label>
         <span class="text-gray-300">|</span>
      @endforeach
   </div>
   <div class="grid grid-cols-3 xl:w-[64%] md:w-full md:px-14 mx-auto my-10 justify-items-center">
         <x-winners header="Top 1">{{$leaders[0]['name'].' | '.$leaders[0]['score']}}</x-winners>
         <x-winners header="Top 2">{{$leaders[1]['name'].' | '.$leaders[1]['score']}}</x-winners>
         <x-winners header="Top 3">{{$leaders[2]['name'].' | '.$leaders[2]['score']}}</x-winners>
   </div>
   <div class="flex justify-center mt-5 gap-20">
      <div class="xl:w-1/4 md:w-96 ">
         <h2 class="text-center text-xl mb-3">By Events</h2>
         @foreach ($byEvents as $event => $contestant)
            <x-accordion-item label="{{ ucwords($event) }}" :array="$contestant" />
         @endforeach
      </div>

      <div class="xl:w-1/4 md:w-96">
         <h2 class=" text-center text-xl mb-3">By Contestants</h2>
         @foreach ($byContestants as $event => $contestant)
            <x-accordion-item label="{{ ucwords($event) }}" :array="$contestant" />
         @endforeach
      </div>
   </div>

   <!-- THE CSS -->
   <style>
      details summary::-webkit-details-marker {
         display: none;
      }


      details[open] summary {
         background: slategrey;
         color: white
      }

      details[open] summary::after {
         content: "-";
      }

      details[open] summary~* {
         /* animation: slideDown 0.3s ease-in-out; */
      }

      details[open] summary p {
         opacity: 0;
         animation-name: showContent;
         animation-duration: 0.6s;
         animation-delay: 0.2s;
         animation-fill-mode: forwards;
         margin: 0;
      }

      @keyframes showContent {
         from {
            opacity: 0;
            height: 0;
         }

         to {
            opacity: 1;
            height: auto;
         }
      }

      @keyframes slideDown {
         from {
            opacity: 0;
            height: 0;
            padding: 0;
         }

         to {
            opacity: 1;
            height: auto;
         }
      }
   </style>
@endsection
