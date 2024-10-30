@extends('layouts.app')

@section('content')
<div class="h-screen grid content-center">
    <x-header-title>Welcome to<br/>Miss IT</x-header-title>
    <form action="" method="post" class="grid justify-items-center gap-5">
        <x-text-input placeholder="Enter passcode..."/>
        <x-primary-button>Enter</x-primary-button>
    </form>
</div>
@endsection
