<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class Category extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'title'=>$this->title,
            'body'=>$this->body
        ];
    }
}
