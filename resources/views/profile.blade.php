@extends('layout_ue8')



@section('name')
    {{ $name }}
@endsection

@section('alter')
    {{ $alter }}
@endsection

@section('bio')
    {{ $bio }}
@endsection

@section('hobbies')
<ul>
@foreach($hobbies as $hobby)
    @include("hobby",['taetigkeit' => $hobby])
@endforeach
</ul>
@endsection