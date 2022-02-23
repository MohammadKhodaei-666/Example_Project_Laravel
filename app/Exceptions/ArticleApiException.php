<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ArticleApiException extends Exception
{
    /**
     * Render the exception as an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return $request->expectsJson()?
            new JsonResponse([
                'data'=>"err in article",
                'status'=>"error"
            ],Response::HTTP_CONFLICT)
            :
            view('error.err');
    }
}
