<?php

namespace App\Models;

use App\Models\User;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model implements HasMedia
{
    use HasFactory , SoftDeletes, InteractsWithMedia;

    protected $fillable = ['name', 'image', 'user_id', 'github_link'];

    public function user(){
       return $this->belongsTo(User::class, 'user_id', 'id')
                ->withDefault(['name' => 'NoTitle']);
    }
}
