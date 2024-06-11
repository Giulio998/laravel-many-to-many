@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <form action="{{ route('admin.technologies.store')}}" method="POST" class="my-5">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Technology's Name">
            </div>
            <div class="text-end mt-3">
            <a class="btn btn-secondary mx-2" href="{{ route('admin.technologies.index') }}">Back</a>
                <button class="btn btn-primary">Create</button>
                
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