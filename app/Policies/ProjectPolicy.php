<?php

namespace App\Policies;

use App\User;
use App\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    public function manage(User $user, Project $project)
    {
        return $project->owner_id == $user->id;
    }
}
