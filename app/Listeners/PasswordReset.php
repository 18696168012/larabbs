<?php

namespace App\Listeners;

use Illuminate\Auth\Events\PasswordReset as PasswordResetSet;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PasswordReset
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
     * @param  PasswordReset  $event
     * @return void
     */
    public function handle(PasswordResetSet $event)
    {
        session()->flash('success','重置passOK了');
    }
}
