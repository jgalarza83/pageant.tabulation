@extends('layouts.app')

@section('content')
   <div class="grid justify-items-center mt-80 gap-5">
        <h3 class="text-3xl">Your input has been recorded</h3>
        <a href="{{route('event.index')}}" class="w-fit"><x-primary-button>Back</x-primary-button></a>
   </div>
@endsection
