<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $guarded=[];
    protected $fillable=['name','slug'];

    public function articles(){
        return $this->belongsToMany(Article::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
