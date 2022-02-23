<?php


namespace App\Services\Permission\Traits;


use App\Models\Permission;
use App\Models\Role;

trait HasRole
{
    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function hasPermission($permission){
        if (Permission::where(['name'=>$permission])->exists()){
            $permission=Permission::where(['name'=>$permission])->first();
            foreach ($this->roles() as $role){
                if ($role->hasPermissionsThroughRole($permission))
                    return true;
            }
            return false;
        }
        return false;
    }
}
