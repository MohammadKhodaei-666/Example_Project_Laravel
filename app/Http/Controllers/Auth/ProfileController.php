<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Repo\UserRepo;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    private $userRepo;

    public function __construct()
    {
        $this->userRepo=new UserRepo();
    }

    public function index()
    {
        //
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

    public function edit($id)
    {
        $user=User::find($id);
        $pageTitle="ویرایش پروفایل";
        return view('authentication.profile',compact('pageTitle','user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $password=Hash::make($request->password);
        $user->password=$password;
        $user->name=$request->name;
        $user->phone=$request->phone;
        try {
            $user->save();
        }
        catch (\Exception $exception){
            return redirect()->back()->with("error");
        }
        return redirect()->route('homepage2')->with("success");
        /*if (!empty($request->password)){
            $password=Hash::make($request->password);
            $user->password=$password;
        }
        $user->save();

        return $result=$this->userRepo->updateUser($id,$request->name,$request->phone);
        //return redirect()->route('homepage2');*/
    }

    public function destroy($id)
    {
        //
    }
}
