@extends('layouts.app')
@section('content')
   <x-header-title class="mt-10">Scores</x-header-title>
   <div class="flex justify-center mt-5 gap-20">
      <div class="w-96">
        <h2 class=" text-center text-xl mb-3">By Events</h2>
         @foreach ($byEvents as $event => $contestant)
            <x-accordion-item event="{{ ucwords($event) }}" :contestants="$contestant" />
         @endforeach
      </div>
      <div class="w-96">
        <h2 class=" text-center text-xl mb-3">By Contestants</h2>
        @foreach ($byContestants as $event => $contestant)
            <x-accordion-item event="{{ ucwords($event) }}" :contestants="$contestant" />
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
