<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Repo\RoleRepo;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private $roleRepo;

    public function __construct()
    {
        $this->roleRepo=new RoleRepo();
    }

    public function index()
    {
        $roles=$this->roleRepo->getAllRoles()->paginate(10);
        return view('back.roles.roles',compact('roles'));
    }

    public function create()
    {
        $permissions=Permission::all()->pluck('name','id');
        return view('back.roles.create',compact('permissions'));
    }

    public function store(RoleRequest $request)
    {
        $result=$this->roleRepo->store($request->name,$request->status,$request->permissions);
        if ($result){
            return redirect()->route('roles.index');
        }
        else{
            return redirect()->back()->withInput();
        }
        /*$role=new Role();
        try {
            $role->create($request->all());
            $role->permissions()->attach($request->permissions);
            return redirect()->route('roles.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withInput();
        }*/
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role=$this->roleRepo->getRole($id);
        $permissions=Permission::all()->pluck('name','id');
        return view('back.roles.edit',compact('role','permissions'));
    }

    public function update(RoleRequest $request, $id)
    {
        $result=$this->roleRepo->updateRole($id,$request->name,$request->status,$request->permissions);
        if ($result){
            return redirect()->route('roles.index');
        }
        else{
            return redirect()->back()->withInput();
        }
    }
    public function destroy($id)
    {
        $result=$this->roleRepo->deleteRole($id);
        if ($result){
            return redirect()->route('roles.index');
        }
        else{
            return redirect()->back();
        }
    }

    public function showDeleteRoles(){
        $roles=$this->roleRepo->getAllDeletes();
        return view('back.roles.delete',compact('roles'));
    }

    public function restoreRole($id){
        $result=$this->roleRepo->restoreRole($id);
        if ($result){
            return redirect()->route('roles.index');
        }
        else{
            return redirect()->back();
        }
    }

    public function forceDelete($id){
        $result=$this->roleRepo->forceDelete($id);
        if ($result){
            return redirect()->route('roles.index');
        }
        else{
            return redirect()->back();
        }
    }
}
