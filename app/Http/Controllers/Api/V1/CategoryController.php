<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Repo\CategoryRepo;
use App\Http\Resources\v1\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryRepo;

    public function __construct()
    {
        $this->categoryRepo=new CategoryRepo();
    }

    public function index()
    {
        $categories=$this->categoryRepo->getAllCategories();
        //return response()->json($categories);
        //return new Category($categories);
        return Category::collection($categories);
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
        $category=$this->categoryRepo->getCategory($id);
        return new Category($category);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
