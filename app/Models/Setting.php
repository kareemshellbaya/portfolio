<?php

namespace App\Models;

use App\Models\User;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    protected $fillable =['user_id', 'favicon', 'logo', 'facebook',  'email', 'linkedin', 'instagram', 'twitter', 'phone'];

    public function user(){

        return $this->belongsTo(User::class ,'user_id', 'id')       //Correct.
        ->withDefault(['name' => 'No Title']);

    }

}
