<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function complete($complete = true)
    {
        $this->update([
            'completed' => $complete
        ]);
    }
    
    public function incomplete()
    {
        return $this->complete(false);
    }
}
