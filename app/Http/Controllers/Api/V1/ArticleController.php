<?php

namespace App\Http\Controllers\Api\V1;

use App\Exceptions\ArticleApiException;
use App\Http\Controllers\Controller;
use App\Http\Repo\ArticleRepo;
use App\Http\Resources\v1\Article;
use App\Http\Resources\v1\ArticleCollection;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private $articleRepo;

    public function __construct()
    {
        return $this->articleRepo=new ArticleRepo();
    }

    public function index()
    {
        $articles=$this->articleRepo->getAllArticle();
        //return Article::collection($articles);
        return new ArticleCollection($articles);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(\App\Models\Article $article)
    {
        throw new ArticleApiException();
        return new Article($article);
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

    public function articlePaginate(){
        $articles=$this->articleRepo->getArticlePerPage(2);
        return new ArticleCollection($articles);
    }
}
