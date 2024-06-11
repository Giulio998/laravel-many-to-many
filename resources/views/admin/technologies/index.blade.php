@extends('layouts.app')
@section('content')
<div>
<div class="container d-flex justify-content-between my-4">
        <h1 >Technologies</h1>
        <div class="d-flex align-items-end">
            <a class="btn btn-primary" href="{{ route('admin.technologies.create') }}">Add technology</a>
        </div>
    </div>
            <div class="container">
        <table class="table">
            <thead>
                <tr>
                    
                    <th>Name</th>
                    <th></th>
                    
                 
                </tr>
            </thead>
            <tbody>
                @foreach($technologies as $technology)

                                <tr>
                                    
                                    <td><a href="{{route('admin.technologies.show', $technology)}}">{{$technology->name}}</a></td>
                                    <td class="d-flex">
                                        <a class="btn btn-info mx-2" href="{{ route('admin.technologies.edit', $technology) }}">Edit technology</a>
                                   


                                        <form class="delete-technology" action="{{ route('admin.technologies.destroy', $technology) }}"
                                            method="POST">


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
@endsection