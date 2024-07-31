<?php

namespace App\Listeners;

use App\Events\UserFilteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendManagerNotificationListener
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
     * @param  \App\Events\UserFilteredEvent  $event
     * @return void
     */
    public function handle(UserFilteredEvent $event)
    {
        info('listener start : ' . $event->count . ' ' . $event->user->id);
        $this->smth();
    }

    private function smth()
    {

    }
}
