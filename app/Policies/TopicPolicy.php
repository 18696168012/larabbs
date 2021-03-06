<?php

namespace App\Policies;

use App\Models\Topic;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicPolicy extends Policy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function update(User $currentuser,Topic $topic)
    {
        return $currentuser->id===$topic->user_id;
    }
    public function destroy(User $currentuser,Topic $topic)
    {
        return $currentuser->id===$topic->user_id;
    }
}
