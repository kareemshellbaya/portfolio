<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Skill::withTrashed()->get();
        return view('dash.skill.all', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usersData = User::with('skills')->get();
        return view('dash.skill.add', compact('usersData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
        ];

        $request->validate($rules);

        $allDataWithoutImages = $request->except(['image']);

        $skill = Skill::create($allDataWithoutImages);

        if($request->file('image')){

            $uploadedImage = $skill->addMediaFromRequest('image')->toMediaCollection('SkillImages');

            $skill->update([

              'image' =>  $uploadedImage->getUrl()

            ]);
        };

        return redirect()->route('dash.skill.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
       return view('dash.skill.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $rules = [
            'name'        => 'required|string',
            'description' => 'required|string',
        ];

        $request->validate($rules);

        $allDataWithoutImages = $request->except(['image']);

        $skill->update($allDataWithoutImages);

        if($request->file('image')){

            $oldLogo   = $skill->media;
            $oldLogo[0]->delete();

            $uploadedImage = $skill->addMediaFromRequest('image')->toMediaCollection('SkillImages');

            $skill->update([

              'image' =>  $uploadedImage->getUrl()

            ]);
        };

        return redirect()->route('dash.skill.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('dash.skill.index');
    }

    public function restore(Skill $skill)
    {
        $skill->restore();
        return redirect()->route('dash.skill.index');
    }

    public function erase(Skill $skill)
    {
        $skill->clearMediaCollection('SkillImages');
        $skill->forceDelete();
        return redirect()->route('dash.skill.index');
    }

}

