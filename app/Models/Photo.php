<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use SoftDeletes;

    protected $guarded=[];
    protected $fillable=['name','path'];

    public function imageable(){
        return $this->morphTo();
    }
}
