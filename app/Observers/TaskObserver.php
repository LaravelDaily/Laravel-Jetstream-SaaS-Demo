<?php

namespace App\Observers;

use App\Models\Task;
use function auth;

class TaskObserver
{
    public function creating(Task $task): void
    {
        $task->user_id = auth()->user()->id;
        $task->team_id = auth()->user()->current_team_id;
    }
}
