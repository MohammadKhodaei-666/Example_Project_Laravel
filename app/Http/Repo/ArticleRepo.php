<?php


namespace App\Http\Repo;


use App\Models\Article;

class ArticleRepo
{
    private $photoRepo;

    public function __construct()
    {
        $this->photoRepo=new PhotoRepo();
    }

    public function getArticle($id){
        if (Article::where('id',$id)->exists()){
            return Article::find($id);
        }
        else{
            return null;
        }
    }

    public function getAllArticle(){
        //return Article::orderBy('id','DESC');
        return Article::all();
    }

    public function store($title,$slug,$body,$price,$user_id,$status,$categories,$photo){
        $article=new Article();
        $article->title=$title;
        $article->slug=$slug;
        $article->body=$body;
        $article->price=$price;
        $article->user_id=$user_id;
        $article->status=$status;
        $article->save();
        $article->categories()->attach($categories);
        $this->photoRepo->uploadPhoto($photo);
        //$article->photos()->create($photo);
    }

    public function getArticlePerPage($item){
        return Article::paginate($item);
    }

}
