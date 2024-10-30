@extends('layouts.app')

@section('content')
<x-header-title class="mt-10">Contestants</x-header-title>

@foreach ($contestants as $contestant)
    {{$contestant->name}}
@endforeach
@endsection
