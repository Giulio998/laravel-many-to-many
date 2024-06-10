@extends('layouts.app')

@section('content')

<main>
  <section>
    <div class="container">
        <h2 class="fs-2">Edit Project</h2>
    </div>
    <div class="container">
        <form  action="{{ route('admin.projects.update',$project) }}" method="POST">
            {{-- Cross Site Request Forgering --}}
            @csrf 
            @method('PUT')
            

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <textarea class="form-control" name="title" id="title" rows="3" placeholder="title"> {{old('title',$project->title)}}</textarea>
            </div>

            <div class="mb-5">
                    <label for="type_id">Type</label>
                    <select name="type_id" id="type_id" name="type_id">
                        <option value="">-- Select Type --</option>
                        @foreach($types as $type)
                        <option @selected($type->id == old('type_id', $project->type_id)) value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>

            <button class="btn btn-primary">Edit</button>
            <a class="btn btn-secondary" href="{{ route('admin.projects.index') }}">Back</a>

        </form>
        <div class="justify-content-end d-flex">
            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"    style="width: 200px" ;>
                                Delete
                            </button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Attention</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Do you really want to delete {{ $project-> title}}?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>

                                            <form class="delete-project"
                                                action="{{ route('admin.projects.destroy', $project) }}" method="POST">


                                                @method('DELETE')
                                                @csrf

                                                <button class="btn btn-danger">Delete</button>
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