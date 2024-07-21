<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Setting::withTrashed()->get();
        return view('dash.setting.all', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userData = User::with('settings')->get();
        return view('dash.setting.add', compact('userData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // @dd($request);
        $rules = [

            'favicon'   => 'required|image',
            'logo'      => 'required|image',
            'facebook'  => 'required|string',
            'email'     => 'required|string',
            'linkedin'  => 'required|string',
            'instagram' => 'required|string',
            'twitter'   => 'required|string',
            'phone'     => 'required|string',
        ];

        $request->validate($rules);

        $allSettingsWithoutImages = $request->except(['favicon', 'logo']);

        $setting =  Setting::create($allSettingsWithoutImages);

        if($request->file('logo')){

          $uploadedLogo  =  $setting->addMediaFromRequest('logo')->toMediaCollection('webSettingLogo');

          $setting->update([

            'logo' => $uploadedLogo->getUrl()

          ]);
        }

        if($request->file('favicon')){

            $uploadedFavicon  =  $setting->addMediaFromRequest('favicon')->toMediaCollection('webSettingFavicon');

            $setting->update([

              'favicon' => $uploadedFavicon->getUrl()

            ]);
          }

        return redirect()->route('dash.setting.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        return view('dash.setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
         // @dd($request);
         $rules = [

            'favicon'   => 'image',
            'logo'      => 'image',
            'facebook'  => 'required|string',
            'email'     => 'required|string',
            'linkedin'  => 'required|string',
            'instagram' => 'required|string',
            'twitter'   => 'required|string',
            'phone'     => 'required|string',
        ];

        $request->validate($rules);

        $allSettingsWithoutImages = $request->except(['favicon', 'logo']);

        $setting->update($allSettingsWithoutImages);

        if($request->file('logo')){

          $oldLogo =  $setting->media;
          $oldLogo[0]->delete();

          $uploadedLogo  =  $setting->addMediaFromRequest('logo')->toMediaCollection('webSettingLogo');

          $setting->update([

            'logo' => $uploadedLogo->getUrl()

          ]);
        }

        if($request->file('favicon')){

            $oldFav = $setting->media;
            $oldFav[1]->delete();

            $uploadedFavicon  =  $setting->addMediaFromRequest('favicon')->toMediaCollection('webSettingFavicon');

            $setting->update([

              'favicon' => $uploadedFavicon->getUrl()

            ]);
          }

        return redirect()->route('dash.setting.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        // @dd($setting);

        $setting->delete();
        return redirect()->route('dash.setting.index');
    }

    public function restore(Setting $setting)
    {

        $setting->restore();
        return redirect()->route('dash.setting.index');
    }

    public function erase(Setting $setting)
    {
        $setting->clearMediaCollection('webSettingLogo');
        $setting->clearMediaCollection('webSettingFavicon');
        $setting->forceDelete();
        return redirect()->route('dash.setting.index');
    }
}
