<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProfileNameController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('/');


Route::prefix('dashboard')
    ->middleware(['auth', 'verified', 'dashAccess'])
    //->except(['dash.message.index', 'dash.message.store', 'dash.message.destroy'])
    ->as('dash.')
    ->group(function(){
        Route::get('/' , function(){
            return view ('dashboard');
        })->name('main');

        Route::resources([

            'setting'      => SettingController::class,
            'users'        => UserController::class,
            'project'      => ProjectController::class,
            'skill'        => SkillController::class,
            'profileName'  => ProfileNameController::class,



        ]);

        Route::get('/settings/restore/{setting}', [SettingController::class, 'restore'])->name('settings.restore');
        Route::get('/settings/erase/{setting}', [SettingController::class, 'erase'])->name('settings.erase');

        Route::get('/users/restore/{user}', [UserController::class, 'restore'])->name('users.restore');
        Route::get('/users/erase/{user}', [UserController::class, 'erase'])->name('users.erase');

        Route::get('/skill/restore/{skill}', [SkillController::class, 'restore'])->name('skill.restore');
        Route::get('/skill/erase/{skill}', [SkillController::class, 'erase'])->name('skill.erase');

        Route::get('/project/restore/{project}', [ProjectController::class, 'restore'])->name('project.restore');
        Route::get('/project/erase/{project}', [ProjectController::class, 'erase'])->name('project.erase');

        Route::get('/profileName/restore/{profile}', [ProfileNameController::class,'restore'])->name('profileName.restore');
        Route::get('/profileName/erase/{profile}', [ProfileNameController::class, 'erase'])->name('profileName.erase');

     
        // Route::get('/message/',[MessageController::class, 'index'])->name('message.index');
        // Route::POST('/message/store/',[MessageController::class, 'store'])->name('message.store');
        // Route::DELETE('/message/delete/{message}',[MessageController::class, 'destroy'])->name('message.destroy');

        Route::get('/message', [MessageController::class, 'index'])->name('message.index')->withoutMiddleware(['auth', 'verified', 'dashAccess']);
        Route::post('/message/store', [MessageController::class, 'store'])->name('message.store')->withoutMiddleware(['auth', 'verified', 'dashAccess']);
        Route::delete('/message/delete/{message}', [MessageController::class, 'destroy'])->name('message.destroy')->withoutMiddleware(['auth', 'verified', 'dashAccess']);

        // Route::get('/message', [MessageController::class, 'index'])->name('message.index');
        // Route::POST('/message/store', [MessageController::class, 'store'])->name('message.store');
        // Route::DELETE('/message/delete/{message}', [MessageController::class, 'destroy'])->name('message.destroy');

    });

        Route::get('payment',[PayPalController::class, 'payment'])->name('payment');
        Route::get('payment/cancel',[PayPalController::class, 'cancel'])->name('payment.cancel');
        Route::get('payment/success',[PayPalController::class, 'success'])->name('payment.success');

    // Route::withoutMiddleware(['auth', 'verified', 'dashAccess'])->group(function () {


    //     Route::get('dashboard/message/',[MessageController::class, 'index'])->name('dash.message.index');
    //     Route::POST('dashboard/message/store/',[MessageController::class, 'store'])->name('dash.message.store');
    //     Route::DELETE('dashboard/message/delete/{message}',[MessageController::class, 'destroy'])->name('dash.message.destroy');


    // });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
