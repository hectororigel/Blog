<?php

namespace App\Http\Controllers;

use App\Project;
Use App\Events\ProjectCreated;
class ProjectsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:update,project')->except(['index']);
    }

    public function index () {

        return view('index', [
            'projects' => auth()->user()->projects
        ]);

    }

    public function show (Project $project)
    {

        return view('projects.show', compact('project'));
    }

    Public function create () {
        return view('projects.create');
    }

    public function store () {


            $attributes = $this->validateProject();

        $attributes['owner_id'] = auth()->id();

        $project = Project::create($attributes);

        return redirect('/projects');
    }

    public function edit (Project $project) {

            return view('projects.edit', compact('project'));
    }


    public function update (Project $project) {

       $project->update($this->validateProject());


        //$project->update(request(['title', 'description']));

        return redirect('/projects');

    }

    public function destroy(Project $project) {

        $project->delete();
return redirect('/projects');
    }

    public function validateProject(){

        return request()->validate([

        'title' => ['required', 'min:3'],
        'description' => ['required', 'min:3']
]);
    }

}
