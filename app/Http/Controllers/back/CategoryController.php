<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Repo\CategoryRepo;
use App\Http\Repo\UserRepo;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $userRepo;
    private $categoryRepo;

    public function __construct()
    {
        $this->userRepo=new UserRepo();
        $this->categoryRepo=new CategoryRepo();
    }

    public function index()
    {
        //$categories=Category::orderBy('id','DESC')->paginate(10);
        $categories=$this->categoryRepo->getAllCategories()->paginate(10);
        return view('back.categories.categories',compact('categories'));
    }

    public function create()
    {
        return view('back.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $result=$this->categoryRepo->store($request->title,$request->slug,$request->body);
        if ($result){
            return redirect()->route('categories.index');
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
        $category=$this->categoryRepo->getCategory($id);
        return view('back.categories.edit',compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $reslut=$this->categoryRepo->updateCategory($id,$request->title,$request->slug,$request->body);
        if ($reslut){
            return redirect()->route('categories.index');
        }
        else{
            return redirect()->route('categories.edit')->withInput();
        }
    }

    public function destroy($id)
    {
        $result=$this->categoryRepo->deleteCategory($id);
        if ($result){
            return redirect()->route('categories.index');
        }
        else{
            return redirect()->back();
        }
    }

    public function showDeleteCategory(){
        $categories=$this->categoryRepo->getAllDelete();
        return view('back.categories.delete',compact('categories'));
    }

    public function restoreCategory($id){
        $result=$this->categoryRepo->restoreCategory($id);
        if ($result){
            return redirect()->route('categories.index');
        }
        else{
            return redirect()->back();
        }
    }

    public function forceDelete($id){
        $result=$this->categoryRepo->forceDelete($id);
        if ($result){
            return redirect()->route('categories.index');
        }
        else{
            return redirect()->back();
        }
    }
}
