@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row my-5">
        <div class="card-body mb-3">
            <h3><strong>Technology's name: </strong> {{ $technology->name }}</h>
            
        </div>
        <div class="d-flex justify-content-between p-0">
            <div>
                <a href="{{ route('admin.technologies.index')}}">
                    <button class="btn btn-secondary">Back</button>
                </a>
                <a href="{{ route('admin.technologies.edit', $technology)}}">
                    <button class="btn btn-primary">Edit</button>
                </a>
            </div>
            <form action="{{ route('admin.technologies.destroy', $technology)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection