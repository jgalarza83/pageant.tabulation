@extends('layouts.app')

@section('content')
<x-header-title class="mt-10">Contestants</x-header-title>

@foreach ($contestants as $contestant)
    <h3 class="text-{{$contestant->color}}">{{$contestant->name}}</h3>
@endforeach
@endsection
