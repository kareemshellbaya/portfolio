<?php

namespace App\Providers;

use App\Models\Skill;
use App\Models\Message;
use App\Models\Project;
use App\Models\Setting;
use App\Models\ProfileName;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $webSettings = Setting::latest()->first();
        View::share(['globalSetting' => $webSettings]);

        $profile_web = ProfileName::latest()->first();
        View::share(['profile_settings' => $profile_web]);

        $webSkill = Skill::all();
        View::share(['globalSkill' => $webSkill]);

        $projects = Project::all();
        View::share(['webProjects'=> $projects]);

        $data = Message::all();
        View::share(['message_data' => $data]);
    }
}
