<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data= $request->all();

        $base_slug = Str::slug($form_data['title']);
        $slug = $base_slug;
        $n = 0;

        do {
            $find = Project::where('slug', $slug)->first();

            if ($find !== null) {
                $n++;
                $slug = $base_slug . '-' . $n;
            }
        } while ($find !== null);

        $form_data['slug'] = $slug;


        $new_project = Project::create($form_data);

        if ($request->has('technologies')) {
            $new_project->technologies()->attach($request->technologies);
        }
        return to_route('admin.projects.show', $new_project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
       

        return view('admin.projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types','technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->all();
        $base_slug = Str::slug($form_data['title']);
        $slug = $base_slug;
        $n = 0;

        do {
            $find = Project::where('slug', $slug)->first();

            if ($find !== null) {
                $n++;
                $slug = $base_slug . '-' . $n;
            }
        } while ($find !== null);
        $form_data['slug'] = $slug;
        $project->update($form_data); 

        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        }
        else {
            $project->technologies()->detach();
        }

        return to_route('admin.projects.show', $project); 
    }

    public function destroy(Project $project)
    {
        $project->technologies()->detach();
        $project->delete();

        return to_route('admin.projects.index');
    }
}

    /**
     * Remove the specified resource from storage.
     */
  

