@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2><strong>Type's name: </strong> {{$type->name}}</h2>
        <p><strong>Description: </strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto reprehenderit facilis repudiandae quas. Voluptate neque, doloremque voluptatibus optio placeat hic?</p>
    </div>
    <div class="d-flex justify-content-between p-0">
            <div>
                <a class="btn btn-secondary" href="{{ route('admin.types.index')}}">
                    Back
                </a>
                <a class="btn btn-primary" href="{{ route('admin.types.edit', $type)}}">
                    Edit
                </a>
            </div>
            <form action="{{ route('admin.types.destroy', $type)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
</div>
@endsection