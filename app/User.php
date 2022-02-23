<?php

namespace App;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Role;
use App\Services\Permission\Traits\HasRole;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable,HasRole;
    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password','phone',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function categories(){
        return $this->hasMany(Category::class);
    }

    public function articles(){
        return $this->hasMany(Article::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function sendEmailVerificationNotification()
    {

    }
}
