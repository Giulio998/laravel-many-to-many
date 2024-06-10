@extends('layouts.app')

@section('title', 'show')

@section('content')
<div class="card">
    <div class="card-body">
        <p><strong>ID:</strong> {{$project->id}}</p>
        <p><strong>Title:</strong> <a href="">{{$project->title}}</a></p>
        <p><strong>Slug:</strong> {{$project->slug}}</p>
        <p><strong>Description:</strong> {{$project->content}}</p>
        <p><strong>Type:</strong> {{$project->type->name ?? 'None'}}</p>
        <h3>Related Projects:</h3>
            @foreach($project->type->projects as $related_project)
            <p><a href="{{ route('admin.projects.show', $related_project)}}">{{$related_project->title}}</a></p>
            @endforeach
            <ul class="d-flex gap-2 list-unstyled">
        <li>Technologies: </li>
        @foreach($project->technologies as $tecnology)            
            <li>{{$tecnology->name}}</li>
        @endforeach
    </ul>
        <a class="btn btn-secondary" href="{{ route('admin.projects.index') }}">Back</a>
        <a href="{{ route('admin.projects.edit', $project)}}" class="btn btn-primary">Edit</a>
    </div>
</div>
</div>

@endsection