@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form action="{{ route('admin.types.store',$type) }}" method="POST" class="my-5">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Type name:</label>
                <textarea class="form-control" name="name" id="name" rows="3" placeholder="name"> {{old('name')}}</textarea>
            </div>
            
            <div class="text-end mt-3">
                <button class="btn btn-primary">Edit</button>
                <a class="btn btn-secondary" href="{{ route('admin.types.index') }}">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection