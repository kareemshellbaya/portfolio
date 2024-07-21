<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Project::withTrashed()->get();
        return view('dash.project.all', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userData = User::with('projects')->get();
        return view('dash.project.add', compact('userData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name'        => 'required|string',
            'github_link' => 'required|string',
            'image'       => 'required|image',
        ];

        $request->validate($rules);

        $allDataWithoutImages = $request->except('image');

       $project =  Project::create($allDataWithoutImages);

       if($request->file('image')){

            $uploadedImage = $project->addMediaFromRequest('image')->toMediaCollection('projectImages');

            $project->update([

                'image' => $uploadedImage->getUrl(),

            ]);
       };
       return redirect()->route('dash.project.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('dash.project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {

        $rules = [
            'name'        => 'required|string',
            'github_link' => 'required|string',
            'image'       => 'required|image',
        ];

        $request->validate($rules);

        $allDataWithoutImages = $request->except('image');

       $project->update($allDataWithoutImages);

       if($request->file('image')){

            $oldImage = $project->media;

            $oldImage[0]->delete();

            $uploadedImage = $project->addMediaFromRequest('image')->toMediaCollection('projectImages');

            $project->update([

                'image' => $uploadedImage->getUrl(),

            ]);
       };
       return redirect()->route('dash.project.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('dash.project.index');
    }

    public function restore(Project $project)
    {
        $project->restore();
        return redirect()->route('dash.project.index');
    }

    public function erase(Project $project)
    {
        $project->clearMediaCollection('projectImages');
        $project->forceDelete();
        return redirect()->route('dash.project.index');
    }
}
