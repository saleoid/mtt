<?php

namespace App\Listeners;

use App\Events\CourtCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendCourtCreateNotification
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
     * @param  CourtCreated  $event
     * @return void
     */
    public function handle(CourtCreated $event)
    {
        Mail::to(env('ADMIN_EMAIL', 'admin@mmt.com'))
          ->queue(new \App\Mail\CourtCreated());
    }
}
