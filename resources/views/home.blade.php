@extends('layouts.app')

@section('content')
<div class="h-96 grid content-end">
    <x-header-title class="mb-7">Welcome to<br/>Miss IT</x-header-title>
    <form action="{{route('event.index')}}" method="get" class="grid justify-items-center gap-5">
        <x-text-input
            type="password"
            class="text-center placeholder:text-center"
            placeholder="Enter passcode..."/>
        <x-primary-button>Enter</x-primary-button>
    </form>
</div>
@endsection
