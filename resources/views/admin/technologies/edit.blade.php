@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <form action="{{ route('admin.technologies.update', $technology)}}" method="POST" class="my-5">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">
                Technology's Name:
                </label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Technology Name" value="{{ old('name', $technology->name)}}">
            </div>
            <div class="text-end mt-3 d-flex justify-content-between">
                <div><a class="btn btn-secondary" href="{{ route('admin.technologies.index') }}">Back</a>
                    <button class="btn btn-primary">Edit</button>
                </div>
                <div>
                    <form class="delete-type " action="{{ route('admin.technologies.destroy', $technology) }}" method="POST">


                        @method('DELETE')
                        @csrf

                        <button class="btn btn-danger ">Delete</button>
                    </form>
                </div>

            </div>
        </form>
    </div>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
</div>
@endsection