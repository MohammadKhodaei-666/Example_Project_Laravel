<?php


namespace App\Http\Repo;


use App\Models\Category;
use Illuminate\Http\Request;

class CategoryRepo
{
    private $category;

    public function __construct()
    {
        $this->category=new Category();
    }

    public function store($title,$slug,$body){
        $category=new Category();
        $category->title=$title;
        $category->slug=$slug;
        $category->body=$body;
        //$category->parent=$parent;
        try {
            $category->save();
            return true;
        }
        catch (\Exception $e){
            return false;
        }
    }

    public function getAllCategories(){
        //return Category::orderBy('id','DESC');
        return Category::all();
    }

    public function getCategory($id){
        if (Category::where('id',$id)->exists()){
            return Category::find($id);
        }
        else{
            return null;
        }
    }

    public function updateCategory($id,$title,$slug,$body){
        $category=$this->getCategory($id);
        if ($category != null){
            $category->title=$title;
            $category->slug=$slug;
            $category->body=$body;
            if ($category->save())
                return true;
            return  false;
        }
        else{
            return  false;
        }
    }

    public function deleteCategory($id){
        $category=$this->getCategory($id);
        if ($category != null){
            if ($category->delete())
                return true;
            return false;
        }
        else{
            return false;
        }
        /*if ($category->destroy()){
            return true;
        }
        else{
            return false;
        }*/
    }

    public function getAllDelete(){
        return Category::onlyTrashed()->get();
    }

    public function restoreCategory($id){
        return Category::onlyTrashed()->where('id',$id)->restore();
    }

    public function forceDelete($id){
        return Category::onlyTrashed()->where('id',$id)->forceDelete();
    }
}
