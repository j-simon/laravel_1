@extends ("layouts.app")

@section("title","projektverwaltung")

@section("header","Projekte Übersicht")

@section('content')
    <h1>Projects</h1>
    <a href="{{ route('projects.create') }}">Add New Project</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Action</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->start_date }}</td>
                    <td>{{ $project->end_date }}</td>
                    <td>{{ $project->status }}</td>
                    <td>
                        <a href="{{ route('projects.edit', $project->id) }}">Edit</a>





                        


                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection