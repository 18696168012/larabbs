<?php

namespace App\Observers;

use App\Models\Link;

class LinkOberver
{
    public function saved(Link $link)
    {
        \Cache::forget($link->cache_key);
    }
    /**
     * Handle the Link "created" event.
     *
     * @param  \App\Models\Link  $link
     * @return void
     */
    public function created(Link $link)
    {

    }

    /**
     * Handle the Link "updated" event.
     *
     * @param  \App\Models\Link  $link
     * @return void
     */
    public function updated(Link $link)
    {
        //
    }

    /**
     * Handle the Link "deleted" event.
     *
     * @param  \App\Models\Link  $link
     * @return void
     */
    public function deleted(Link $link)
    {
        //
    }

    /**
     * Handle the Link "restored" event.
     *
     * @param  \App\Models\Link  $link
     * @return void
     */
    public function restored(Link $link)
    {
        //
    }

    /**
     * Handle the Link "force deleted" event.
     *
     * @param  \App\Models\Link  $link
     * @return void
     */
    public function forceDeleted(Link $link)
    {
        //
    }
}
