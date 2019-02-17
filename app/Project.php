<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'description'];
    // Accept everything excepts these values
    //protected $guarded = [];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($task)
    {
        return $this->tasks()->create($task);
    }
}
