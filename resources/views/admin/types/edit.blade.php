@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form action="{{ route('admin.types.update', $type) }}" method="POST" class="my-5">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Type's name:</label>
                <textarea class="form-control" name="name" id="name" rows="3"
                    placeholder="name"> {{old('name', $type->name)}}</textarea>
            </div>


            <div class="text-end mt-3 d-flex justify-content-between">
                <div><a class="btn btn-secondary" href="{{ route('admin.types.index') }}">Back</a>
                    <button class="btn btn-primary">Edit</button>
                </div>
                <div>
                    <form class="delete-type " action="{{ route('admin.types.destroy', $type) }}" method="POST">


                        @method('DELETE')
                        @csrf

                        <button class="btn btn-danger ">Delete</button>
                    </form>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection