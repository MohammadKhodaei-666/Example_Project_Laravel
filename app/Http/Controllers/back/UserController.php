<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Repo\UserRepo;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $userRepo;

    public function __construct()
    {
        $this->userRepo=new UserRepo();
    }

    public function index()
    {
        $users=$this->userRepo->getAllUsers()->paginate(10);
        return view('back.users.users',compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        $roles=Role::all()->pluck('name','id');
        if (Gate::allows('edit-user',$user)){
            if ($user != null){
                return view('back.users.profile',compact('user','roles'));
            }
            else{
                return redirect()->back();
            }
        }
        else{
            echo "you can not";
        }

    }

    public function update(UserRequest $request, $id)
    {
        $password=Hash::make($request->password);
        $result=$this->userRepo->updateUser($id,$request->name,$request->email,$request->phone,$request->roles,$password);
        if ($result){
            return redirect()->route('users.index');
        }
        else{
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        $result=$this->userRepo->deleteUser($id);
        if ($result){
            return redirect()->route('users.index');
        }
        else{
            return redirect()->back();
        }
    }

    public function blockShow(){
        $users=$this->userRepo->getAllBlockShow();
        return view('back.users.block',compact('users'));
    }

    public function restoreUser($id){
        $user=Auth::user();
        if ($user->can('restore-user',$user)){
            $result=$this->userRepo->restoreUser($id);
            if ($result){
                return redirect()->route('users.index');
            }
            else{
                return redirect()->back();
            }
        }
        else{
            echo "شما اجازه ویرایش ندارید";
        }
    }

    public function forceDelete($id){
        $result=$this->userRepo->forceDelete($id);
        if ($result){
            return redirect()->route('users.index');
        }
        else{
            return redirect()->back();
        }
    }
}
