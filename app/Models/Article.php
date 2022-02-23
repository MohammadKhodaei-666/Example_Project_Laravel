<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    //protected $dates=['deleted_at'];
    protected $guarded=[];
    protected $fillable=['title','slug','body','status'];
    protected $attributes=[
        'hit'=>1,
    ];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function photos(){
        return $this->morphMany(Photo::class,'photoable');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
