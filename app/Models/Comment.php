<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $guarded=[];

    public function articles(){
        return $this->belongsTo(Article::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
