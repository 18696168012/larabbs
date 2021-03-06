<?php

namespace App\Observers;

use App\Models\Reply;
use App\Notifications\TopicReplied;

class ReplyObserver
{
    /**
     * Handle the Reply "created" event.
     *
     * @param  \App\Models\Reply  $reply
     * @return void
     */
    public function created(Reply $reply)
    {
        // 命令行运行迁移时不做这些操作！
        if ( ! app()->runningInConsole()) {
            $reply->topic->reply_count = $reply->topic->replies->count();
            $reply->topic->save();
            $reply->topic->user->topicReplyNotify(new TopicReplied($reply));
        }

    }

    /**
     * Handle the Reply "updated" event.
     *
     * @param  \App\Models\Reply  $reply
     * @return void
     */
    public function updated(Reply $reply)
    {
        //
    }

    /**
     * Handle the Reply "deleted" event.
     *
     * @param  \App\Models\Reply  $reply
     * @return void
     */
    public function deleted(Reply $reply)
    {
        $reply->topic->reply_count = $reply->topic->replies->count();
        $reply->topic->save();
    }

    /**
     * Handle the Reply "restored" event.
     *
     * @param  \App\Models\Reply  $reply
     * @return void
     */
    public function restored(Reply $reply)
    {
        //
    }

    /**
     * Handle the Reply "force deleted" event.
     *
     * @param  \App\Models\Reply  $reply
     * @return void
     */
    public function forceDeleted(Reply $reply)
    {
        //
    }
}
