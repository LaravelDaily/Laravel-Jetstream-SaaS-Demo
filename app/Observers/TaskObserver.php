<?php

namespace App\Observers;

use App\Models\Task;

class TaskObserver
{
    public function creating(Task $task): void
    {
        $task->user_id = auth()->user()->id;
    }
}
