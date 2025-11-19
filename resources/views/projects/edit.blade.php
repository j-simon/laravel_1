@extends('layouts.app')

@section("title","projektverwaltung - Projekt ändern")

@section("header","Projekt edit")

@section('content')
    <h1>Edit Project</h1>
    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Project Name</label>
        <input type="text" id="name" name="name" value="{{ $project->name }}" required>

        <label for="description">Description</label>
        <textarea id="description" name="description">{{ $project->description }}</textarea>

        <label for="start_date">Start Date</label>
        <input type="date" id="start_date" name="start_date" value="{{ $project->start_date }}">

        <label for="end_date">End Date</label>
        <input type="date" id="end_date" name="end_date" value="{{ $project->end_date }}">

        <label for="status">Status</label>
        <select id="status" name="status">
            <option value="pending" {{ $project->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="in_progress" {{ $project->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
            <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>

        <button type="submit">Update Project</button>
    </form>
@endsection