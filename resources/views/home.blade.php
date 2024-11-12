@extends('layouts.app')

@section('content')
   <div class="h-96 grid content-end">
      <x-header-title class="mb-7">Welcome to<br />Miss IT</x-header-title>
      <form action="{{ route('auth.login') }}" method="post" class="grid justify-items-center gap-5">
         @csrf
         <x-text-input type="text" name="passcode" id="passcode" class="text-center placeholder:text-center"
            placeholder="Enter passcode..." />
         @if ($errors->any())
            @foreach ($errors->all() as $error)
               <p class="text-red-500 w-screen text-center">{{$error}}</p>
            @endforeach
         @endif
         <x-primary-button type="submit">Enter</x-primary-button>
      </form>
   </div>
@endsection
