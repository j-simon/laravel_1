@extends('layouts.app')

@section("title","projektverwaltung - neues projekt")

@section("header","Projekt neu")

@section('content')
    <h1>Add New Project</h1>
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <label for="name">Project Name</label>
        <input type="text" id="name" name="name" required>

        <label for="description">Description</label>
        <textarea id="description" name="description"></textarea>

        <label for="start_date">Start Date</label>
        <input type="date" id="start_date" name="start_date">

        <label for="end_date">End Date</label>
        <input type="date" id="end_date" name="end_date">

        <button type="submit">Save Project</button>
    </form>
@endsection