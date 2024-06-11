@extends('layouts.app')

@section('content')

<main>
    <section>
        <div class="container">
            <h2 class="fs-2">Create Project</h2>
        </div>
        <div class="container">
            <form action="{{ route('admin.projects.store') }}" method="POST">
                {{-- Cross Site Request Forgering --}}
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">title</label>
                    <textarea class="form-control" name="title" id="title" rows="3"
                        placeholder="title"> {{old('title')}}</textarea>
                </div>
                <div class="mb-5">
                    <label for="type_id">Type</label>
                    <select name="type_id" id="type_id" name="type_id">
                        <option value="">-- Select Type --</option>
                        @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-5 d-flex align-items-center">
                    @foreach($technologies as $technology)
                        <div class="form-check mx-2">
                            <input type="checkbox" name="technologies[]" class="form-check-input"
                                value="{{$technology->id}}" id="{{$technology->id}}">
                            <label for="{{$technology->id}}">{{ $technology->name }}</label>
                        </div>
                    @endforeach
                </div>



                <div class="d-flex justify-content-end">
                <a class="btn btn-secondary mx-2" href="{{ route('admin.projects.index') }}">Back</a>
                <button class="btn btn-primary">Create</button>
                </div>
                

            </form>

            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </section>
</main>

@endsection