@extends ('layouts.app')

@section('content')

<section>
    <div class="container d-flex justify-content-between">
        <h1>Projects</h1>
        <div class="d-flex align-items-end">
            <a class="btn btn-info" href="{{ route('admin.projects.create') }}">Create new project</a>
        </div>
    </div>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)

                                <tr>
                                    <td>{{$project->id}}</td>
                                    <td><a href="{{route('admin.projects.show', $project)}}">{{$project->title}}</a></td>
                                    <td>{{$project->slug}}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('admin.projects.edit', $project) }}">Edit project</a>
                                    </td>
                                    <td>


                                        <form class="delete-project" action="{{ route('admin.projects.destroy', $project) }}"
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


</section>

@endsection