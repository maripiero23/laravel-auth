@extends('layouts.app')

@section('content')
<div class="text-center my-3">
    <h1 class="text-dark">Pogetto #{{ $project->id }}</h1>
</div>
<div class="card my-3">
    <div class="card-body">
        <table class="table">
        <thead>
            <tr>
            <th>ID</th>
            <th>Titolo</th>
            <th>Descrizione</th>
            <th>Thumb</th>
            <th>GitHub</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->description }}</td>
                <td>{{ $project->cover_img }}</td>
                <td>{{ $project->github_link }}</td>
            </tr>
        </tbody>
        </table>
    </div>
</div>
<div class="text-center mt-3">
    <a href="{{route('admin.projects.index')}}"><button class="btn btn-secondary fw-semibold">All Projects</button></a>
</div>
@endsection