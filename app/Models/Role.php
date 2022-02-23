<?php

namespace App\Models;

use App\Services\Permission\Traits\HasPermission;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes,HasPermission;

    protected $guarded=[];

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
