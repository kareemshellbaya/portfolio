<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ProfileName;
use Illuminate\Http\Request;

class ProfileNameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ProfileName::withTrashed()->get();
        return view('dash.profile.all', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userData = User::with('profile')->get();
        // dd($userData);
        return view('dash.profile.add', compact('userData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules=[
            // 'user_id'    => 'required|Integer',
            'age'        => 'required|Integer|max:99',
            'city'       => 'required|string',
            'country'    => 'required|string',
            'github'     => 'required|string',
            'telegram'   => 'required|string',
            'whatsapp'   => 'required|string',
            'skype'      => 'required|string',
            'website'    => 'required|string',
        ];

        // $request->validate($rules);

        $validate_data =  $request->validate($rules);

        // dd($request);

        $profile_data = ProfileName::create($validate_data);

        $profile_data->update([
           'user_id'=> $request->user_id
        ]);

        return redirect()->route('dash.profileName.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfileName $profileName)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfileName $profileName)
    {
        return view('dash.profile.edit', compact('profileName'));
        // @dd($request);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfileName $profileName)
    {

        $rules=[
            'age'        => 'required|Integer|max:99',
            'birthday'   => 'required|string',
            'city'       => 'required|string',
            'country'    => 'required|string',
            'address'    => 'required|string',
            'github'     => 'required|string',
            'telegram'   => 'required|string',
            'whatsapp'   => 'required|string',
            'skype'      => 'required|string',
            'website'    => 'required|string',
        ];

       $allData = $request->validate($rules);

       $profileName->update($allData);


       return redirect()->route('dash.profileName.index');
    }

    /**
     * Remove the specified resource from storage.
     */


    public function destroy( $id)
    {
        // dd($id);
       $profileNamex = ProfileName::findOrFail($id);

        // dd($profileName);

        $profileNamex->delete();

        return redirect()->route('dash.profileName.index');
    }

    public function restore(ProfileName $ProfileName)
    {
        $ProfileName->restore();
        return redirect()->route('dash.profileName.index');
    }

    public function erase(ProfileName $ProfileName)
    {
        $ProfileName->forceDelete();
        return redirect()->route('dash.profileName.index');
    }
}
