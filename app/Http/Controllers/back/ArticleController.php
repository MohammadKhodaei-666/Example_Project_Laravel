<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Repo\ArticleRepo;
use App\Http\Requests\ArticleRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private $articleRepo;

    public function __construct()
    {
        $this->articleRepo=new ArticleRepo();
    }

    public function index()
    {
        $articles=$this->articleRepo->getAllArticle()->paginate(10);
        return view('back.articles.articles',compact('articles'));
    }

    public function create()
    {
        $categories=Category::all()->pluck('title','id');
        return view('back.articles.create',compact('categories'));
    }

    public function store(ArticleRequest $request)
    {
        $result=$this->articleRepo->store($request->title,$request->slug,$request->body,$request->price,$request->user_id,$request->status,$request->categories,$request->photo);
        if ($result){
            return redirect()->route('articles.index');
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
