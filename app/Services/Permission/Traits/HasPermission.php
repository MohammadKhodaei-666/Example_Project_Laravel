<?php


namespace App\Services\Permission\Traits;


use App\Models\Permission;

trait HasPermission
{
    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermissionsThroughRole(Permission $permission){
        return $this->permissions()->contains($permission);
    }
}
