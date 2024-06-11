<?php

namespace App\Http\Controllers\Admin;
use App\Models\Technology;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use Illuminate\Http\Request;

class TechnologyController extends Controller

    {
        public function index()
        {
            $technologies = Technology::all();
            return view('admin.technologies.index', compact('technologies'));
        }
    
    
        public function create()
        {
            return view('admin.technologies.create');
        }
    
    
        public function store(StoreTechnologyRequest $request)
        {
            $form_data = $request->all();
        $new_technology = Technology::create($form_data);
        return to_route('admin.technologies.show', $new_technology);
        }
    
    
        public function show(Technology $technology)
        {
            return view('admin.technologies.show', compact('technology'));
    
        }
    
    
        public function edit(Technology $technology)
        {
            return view('admin.technologies.edit', compact('technology'));
        }
    
    
        public function update(UpdateTechnologyRequest $request, Technology $technology)
        {
            $form_data = $request->validated();
        $technology->update($form_data);
        return to_route('admin.technologies.show', $technology);
        }
    
    
        public function destroy(Technology $technology)
        {
            $technology->delete();
        return to_route('admin.technologies.index');
        }
    }
