<?php

namespace App\Listeners;

use App\Events\ProjectCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\ProjectCreated as ProjectCreatedMail;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewProjectCreated;

class SendProjectCreatedNotification
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
     * @param  ProjectCreated  $event
     * @return void
     */
    public function handle(ProjectCreated $event)
    {
        // Send notification to multiple channels
        $event->project->owner->notify(new NewProjectCreated($event->project));

        // Send an email
        /* Mail::to($event->project->owner->email)->send(
            new ProjectCreatedMail($event->project)
        );
        */
    }
}
