<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function index()
    {
        $data = Profile::withTrashed()->get();
        return view('dash.profile.all', compact('data'));

    }


    public function create(){

        $userData = User::with('profile')->get();
        return view('dash.profile.add', compact('userData'));

    }

    public function store(Request $request){

        $rules=[
            'age'        => 'required|Integer|max:99',
            'birthday'   => 'required|string',
            'city'       => 'required|string',
            'country'    => 'required|string',
            'address'    => 'required|string',
            'github'     => 'required|string',
            'telegram'   => 'required|string',
            'whatsapp'   => 'required|integer',
            'skype'      => 'required|string',
            'website'    => 'required|string',
        ];

        $request->validate($rules);

        $validate_data =  $request->validate($rules);


        $profile_data = Profile::create($validate_data);

        return redirect()->route('dash.profile.index');


    }

    public function reedit( Profile $profile) {

        return view('dash.profile.all', compact('profile'));
    }

    public function updated(Request $request, Profile $profile)
    {

        $rules=[
            'age'        => 'required|Integer|max:99',
            'birthday'   => 'required|string',
            'city'       => 'required|string',
            'country'    => 'required|string',
            'address'    => 'required|string',
            'github'     => 'required|string',
            'telegram'   => 'required|string',
            'whatsapp'   => 'required|integer',
            'skype'      => 'required|string',
            'website'    => 'required|string',
        ];

       $allData = $request->validate($rules);

       $profile->update($allData);

       return redirect()->route('dash.profile.index');
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function deleted(Profile $profile)
    {
        $profile->delete();
        return redirect()->route('dash.profile.index');
    }

    public function restore(Profile $profile)
    {
        $profile->restore();
        return redirect()->route('dash.profile.index');
    }

    public function erase(Profile $profile)
    {
        $profile->forceDelete();
        return redirect()->route('dash.profile.index');
    }

}
