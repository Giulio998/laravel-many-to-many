@extends('layouts.app')

@section('content')

<section >
  <div class="container">
    <div class="row">
      <div class="d-flex justify-content-between my-4">
        <h1 >Types</h1>
        <a href="{{ route('admin.types.create')}}">
          <button class="btn btn-primary">Add Type</button>
        </a>
      </div>

      <div >
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th></th>
              
            </tr>
          </thead>
          <tbody>
            @foreach($types as $type)
            <tr>
              <td><a href="{{route('admin.types.show', $type)}}">{{$type->name}}</a></td>
              <td class="d-flex">
              <a class="btn btn-info mx-2" href="{{ route('admin.types.edit', $type) }}">Edit type</a>
            
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