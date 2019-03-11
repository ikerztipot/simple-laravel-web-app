<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectCreated;
use App\Events\ProjectCreated as ProjectCreatedEvent;

class Project extends Model
{
    protected $fillable = ['title', 'description', 'owner_id'];
    // Accept everything excepts these values
    //protected $guarded = [];

    //Other aproach to fire a custom event -> binding automatically fired Model event to custom event
    // protected $dispatchesEvents = [
    //     'created' => ProjectCreatedEvent::class
    // ];

    protected static function boot()
    {
        parent::boot();

        static::created(function($project) {
            // Mail::to($project->owner->email)->send(
            //     new ProjectCreated($project)
            // );
        });
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($task)
    {
        return $this->tasks()->create($task);
    }
}
