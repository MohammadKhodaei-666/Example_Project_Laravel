<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Repo\PermissionRepo;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    private $permissionRepo;

    public function __construct()
    {
        $this->permissionRepo=new PermissionRepo();
    }

    public function index()
    {
        //$permission=Permission::orderBy('id','DESC')->paginate(10);
        $permissions=$this->permissionRepo->allPermissions()->paginate(10);
        return view('back.permissions.permissions',compact('permissions'));
    }

    public function create()
    {
        return view('back.permissions.create');
    }

    public function store(PermissionRequest $request)
    {
        $result=$this->permissionRepo->store($request->name);
        if ($result){
            return redirect()->route('permissions.index');
        }
        else{
            return redirect()->back()->withInput();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $permission=$this->permissionRepo->getPermission($id);
        return view('back.permissions.edit',compact('permission'));
    }

    public function update(PermissionRequest $request, $id)
    {
        $result=$this->permissionRepo->updatePermission($id,$request->name);
        if ($result){
            return redirect()->route('permissions.index');
        }
        else{
            return redirect()->route('permissions.edit')->withInput();
        }
    }

    public function destroy($id)
    {
        $result=$this->permissionRepo->deletePermission($id);
        if ($result){
            return redirect()->route('permissions.index');
        }
        else{
            return redirect()->route('permissions.index');
        }
        //return $this->permissionRepo->delete($permission);
        /*$result=Permission::findOrFail($id);
        return $result->destroy();*/
    }

    public function showDeletePermission(){
        $permissions=$this->permissionRepo->getAllDelete();
        return view('back.permissions.deletepermissions',compact('permissions'));
    }

    public function restorePermission($id){
        $result=$this->permissionRepo->restorePermission($id);
        if ($result){
            return redirect()->route('permissions.index');
        }
        else{
            return redirect()->back();
        }
    }

    public function forceDelete($id){
        $result=$this->permissionRepo->forceDelete($id);
        if ($result){
            return redirect()->route('permissions.index');
        }
        else{
            return redirect()->back();
        }
    }
}
