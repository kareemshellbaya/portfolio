<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Setting;
use App\Models\ProfileName;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, softDeletes;



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function skills(){

        return $this->hasMany(Skill::class, 'user_id' , 'id');
    }

    public function projects(){

        return $this->hasMany(Project::class, 'user_id' , 'id');
    }

    public function settings(){

        return $this->hasMany(Setting::class, 'user_id', 'id');
    }

    public function profile() {

        return $this->hasOne(ProfileName::class, 'user_id' ,'id' );

    }
}


