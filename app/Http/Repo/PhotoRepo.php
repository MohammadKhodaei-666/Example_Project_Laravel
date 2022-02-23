<?php


namespace App\Http\Repo;


use App\Models\Article;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoRepo
{
    private $saveFolder='public/images';

    public function savePhoto2($photo){
        $name="image";
        $newName=time();
        $result=Storage::disk('public')->putFileAs('articles',$photo,$newName);

        /*return[
            'name'=>$newName,
            'path'=>$result
        ];*/
        $article=new Article();
        $article->photos()->save($photo);/*create([
            'name'=>$newName,
            'alt'=>$name,
            'path'=>$result,*/
            /*'photoable_id'=>$article->id,
            'photoable_type'=>$article
        ]);*/
    }

    public function savePhoto($image){
        $photo=new Photo();
        $article=new Article();
        $newName=time();
        $photo->name=$newName;
        $photo->path=Storage::disk('public')->putFileAs('articles',$image,$newName);
        /*$photo->imageable_type=Article::class;
        $photo->imageable_id=$article->id;*/
        $article->photos()->create($image);
    }

    /*public function uploadPhoto2($image)
    {
        $photo = new Photo();
        $article = new Article();
        if ($image->hasFile('image')) {
            $completeFileName = $image->file('image')->getClientOriginalName();
            $fileName = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $image->file('image')->getClientOriginalExtension();
            $fileSize = $image->file('image')->getSize();

            $comPic = str_replace(" ", "-", $fileName) . "-" . rand() . "_" . time() . "." . $extension;
            $image->file('image')->storeAs($this->saveFolder, $comPic);

            $photo->name = $fileName;
            //$photo->extension=$extension;
            //$photo->size=$fileSize;
            //$photo->tags=$request->tags ?? "";
            $photo->path = $this->saveFolder;
            $article->photos()->create($image);
            //dd($path);
        }
    }*/

    public function uploadPhoto(Request $request){
        $photo=new Photo();
        $article=new Article();
        if ($request->hasFile('image')){
            $completeFileName=$request->file('image')->getClientOriginalName();
            $fileName=pathinfo($completeFileName,PATHINFO_FILENAME);
            $extension=$request->file('image')->getClientOriginalExtension();
            $fileSize=$request->file('image')->getSize();

            $comPic=str_replace(" ","-",$fileName)."-".rand()."_".time().".".$extension;
            $request->file('image')->storeAs($this->saveFolder,$comPic);

            $photo->name=$fileName;
            //$photo->extension=$extension;
            //$photo->size=$fileSize;
            //$photo->tags=$request->tags ?? "";
            $photo->path=$this->saveFolder;
            $article->photos()->save($photo);
            //dd($path);
        }
    }














}
