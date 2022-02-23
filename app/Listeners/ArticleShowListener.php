<?php

namespace App\Listeners;

use App\Events\ArticleShow;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ArticleShowListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ArticleShow  $event
     * @return void
     */
    public function handle(ArticleShow $event)
    {
        //
    }
}
