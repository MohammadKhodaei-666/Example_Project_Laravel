<?php


namespace App\Http\Repo;


use App\Models\Category;
use App\Models\Role;
use App\User;

class UserRepo
{
    public function getAllUsers(){
        return User::orderBy('id');
    }

    public function getUser($id){
        if (User::where("id",$id)->exists()){
            return User::find($id);
        }else{
            return null;
        }
    }

    public function updateUser2($id,$name,$phone){
        $user=$this->getUser($id);
        if ($user != null){
            $user->name=$name;
            $user->phone=$phone;
            if ($user->save())
                return "Updated";
            return "Error";
        }else{
            return "Not Found";
        }
    }

    public function insertCategory($title,$slug,$body){
        $user=new User();
        $category=new Category();
        $category->title=$title;
        $category->slug=$slug;
        $category->body=$body;
        $user->categories()->save($category);
    }

    public function updateUser($id,$name,$email,$phone,$roles,$password){
        $user=$this->getUser($id);
        //$roles=new Role();
        $user->name=$name;
        $user->email=$email;
        $user->phone=$phone;
        $user->password=$password;
        if ($user->update()){
            $user->roles()->sync($roles);
            return true;
        }
        else{
            return false;
        }
    }

    public function deleteUser($id){
        $user=$this->getUser($id);
        if ($user->delete()){
            return true;
        }
        else{
            return false;
        }
    }

    public function getAllBlockShow(){
        return User::onlyTrashed()->get();
    }

    public function restoreUser($id){
        return User::onlyTrashed()->where('id',$id)->restore();
    }

    public function forceDelete($id){
        return User::onlyTrashed()->where('id',$id)->forceDelete();
    }

}
