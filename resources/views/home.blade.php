@extends('layout')

@section('title', 'Home Page')

@section('content')
    <p>This is the main content of the home page.</p>
@endsection

@section('footer')
    <p>My Laravel Application</p>
    <x-alert>
        <p style="color:blue">This is an important message!</p>
    </x-alert>
@endsection

@push('styles')
<link href="css/custom.css" rel="stylesheet">
@endpush