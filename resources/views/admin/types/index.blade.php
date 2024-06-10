@extends('layouts.app')

@section('content')

<section class="my-5">
  <div class="container">
    <div class="row">
      <div class="d-flex justify-content-between">
        <h1>Types</h1>
        <a href="{{ route('admin.types.create')}}">
          <button class="btn btn-primary">Add Type</button>
        </a>
      </div>

      <div class="my-5">
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
            </tr>
          </thead>
          <tbody>
            @foreach($types as $type)
            <tr>
              <td><a href="{{route('admin.types.show', $type)}}">{{$type->name}}</a></td>
              <td>
              <a class="btn btn-info" href="{{ route('admin.types.edit', $type) }}">Edit type</a>
              </td>
              <td>
              <form class="delete-type" action="{{ route('admin.types.destroy', $type) }}" method="POST">


                @method('DELETE')
                @csrf

                <button class="btn btn-danger">Delete</button>
              </form>
          </div>
          </td>
          </tr>
        @endforeach
      </tbody>

      </table>
    </div>
  </div>
  </div>
</section>

@endsection