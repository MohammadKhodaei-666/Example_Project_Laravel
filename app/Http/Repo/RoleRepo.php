<?php


namespace App\Http\Repo;


use App\Models\Permission;
use App\Models\Role;

class RoleRepo
{
    public function getAllRoles(){
        return Role::orderBy('id','DESC');
    }

    public function getRole($id){
        if (Role::where('id',$id)->exists()){
            return Role::find($id);
        }
        else{
            return null;
        }
    }

    public function store($name,$status,$permissions){
        /*$role=new Role();
        $permission=new Permission();
        $role->name=$name;
        $role->status=$status;
        try {
            $role->save();
            $role->permissions()->attach($permission);
            return true;
        }
        catch (\Exception $e){
            return false;
        }*/
        //$permission=Permission::find($permissions);
        //$permission=new Permission();
        $role=new Role();
        $role->name=$name;
        $role->status=$status;
        //$permission->permissions=$permissions;
        $role->save();
        $role->permissions()->attach($permissions);
    }

    public function updateRole($id,$name,$status,$permissions){
        $role=$this->getRole($id);
        $role->name=$name;
        $role->status=$status;
        if ($role->update()){
            $role->permissions()->sync($permissions);
            return true;
        }
        else{
            return false;
        }
    }

    public function deleteRole($id){
        $role=$this->getRole($id);
        if ($role != null){
            if ($role->delete())
                return true;
            return false;
        }
        else{
            return false;
        }
    }

    public function getAllDeletes(){
        return Role::onlyTrashed()->get();
    }

    public function restoreRole($id){
        return Role::onlyTrashed()->where('id',$id)->restore();
    }

    public function forceDelete($id){
        return Role::onlyTrashed()->where('id',$id)->forceDelete();
    }





}
