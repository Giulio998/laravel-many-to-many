@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form action="{{ route('admin.types.store') }}" method="POST" class="my-5">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Type name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Type Name">
            </div>
            
            <div class="text-end mt-3">
                <button class="btn btn-primary">Create</button>
                <a class="btn btn-secondary" href="{{ route('admin.types.index') }}">Back</a>
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