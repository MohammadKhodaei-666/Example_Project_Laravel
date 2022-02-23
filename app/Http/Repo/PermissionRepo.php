<?php


namespace App\Http\Repo;


use App\Models\Permission;

class PermissionRepo
{
    private $permission;

    public function __construct()
    {
        $this->permission=new Permission();
    }

    public function store($name){
        $permission=new Permission();
        $permission->name=$name;
        try {
            $permission->save();
            return true;
        }
        catch (\Exception $e){
            return false;
        }
    }

    public function allPermissions(){
        return Permission::orderBy('id','DESC');
    }

    public function getPermission($id){
        if (Permission::where('id',$id)->exists()){
            return Permission::find($id);
        }
        else{
            return null;
        }
    }

    public function updatePermission($id,$name){
        $permission=$this->getPermission($id);
        if ($permission != null){
            $permission->name=$name;
            if ($permission->save())
                return true;
            else
                return false;
        }
        else{
            return false;
        }
    }

    public function deletePermission($id){
        //return $permission=Permission::destroy($id);
        /*$permission=Permission::where('id',$id)->first();
        return $permission->delete();
        return redirect()->route('permissions.index');*/
        $permission=$this->getPermission($id);
        if ($permission != null){
            if ($permission->delete())
                return true;
            return false;
        }
        else{
            return false;
        }
        /*$permission=$this->getPermission($id);
        return $permission->destroy();*/
    }

    public function delete($permission){
        return $permission->delete();
    }

    public function getAllDelete(){
        return Permission::onlyTrashed()->get();
    }

    public function restorePermission($id){
        return Permission::onlyTrashed()->where('id',$id)->restore();
    }

    public function forceDelete($id){
        return Permission::onlyTrashed()->where('id',$id)->forceDelete();
    }
}
