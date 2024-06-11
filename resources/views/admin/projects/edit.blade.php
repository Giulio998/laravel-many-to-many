@extends('layouts.app')

@section('content')

<main>
    <section>
        <div class="container">
            <h2 class="fs-2">Edit Project</h2>
        </div>
        <div class="container">
            <form action="{{ route('admin.projects.update', $project) }}" method="POST">
                {{-- Cross Site Request Forgering --}}
                @csrf
                @method('PUT')


                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <textarea class="form-control" name="title" id="title" rows="3"
                        placeholder="title"> {{old('title', $project->title)}}</textarea>
                </div>

                <div class="mb-5">
                    <label for="type_id">Type</label>
                    <select name="type_id" id="type_id" name="type_id">
                        <option value="">-- Select Type --</option>
                        @foreach($types as $type)
                            <option @selected($type->id == old('type_id', $project->type_id)) value="{{$type->id}}">
                                {{$type->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-5 d-flex align-items-center">
                    @foreach($technologies as $technology)
                        <div class="form-check mx-2">
                            <input @checked(in_array($technology->id, old('technologies', $project->technologies->pluck('id')->all()))) type="checkbox" name="technologies[]"
                                class="form-check-input" value="{{$technology->id}}" id="{{$technology->id}}">
                            <label for="{{$technology->id}}">{{ $technology->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        <a class="btn btn-secondary" href="{{ route('admin.projects.index') }}">Back</a>
                        <button class="btn btn-primary">Edit</button>
                    </div>
                    <div>
                        <form action="{{ route('admin.projects.destroy', $project)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>


            </form>

        </div>
        </div>
        </div>
        </div>
        </div>


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