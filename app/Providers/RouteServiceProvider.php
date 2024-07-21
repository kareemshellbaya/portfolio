<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Skill;
use App\Models\Message;
use App\Models\Project;
use App\Models\Setting;
use App\Models\ProfileName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';
    public const DASHBOARD = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });

        Route::bind('setting', function($value){

                return Setting::withTrashed()->where('id', $value)->firstOrFail();
        });

        Route::bind('user', function($value){

                return User::withTrashed()->where('id', $value)->firstOrFail();
        });

        Route::bind('skill', function($value){

            return Skill::withTrashed()->where('id', $value)->firstOrFail();
        });

        Route::bind('project', function($value){

            return Project::withTrashed()->where('id', $value)->firstOrFail();
        });

        Route::bind('profile', function($value){

            return ProfileName::withTrashed()->where('id', $value)->firstOrFail();
        });

        Route::bind('message', function($value){

           return Message::all()->where('id', $value)->firstOrFail();
        });
    }

}
