<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use function auth;

class TaskOwnerScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->when(auth()->user()->hasRole('user'), function (Builder $builder) {
            $builder->where('user_id', auth()->id())
                ->orWhere('team_id', auth()->user()->current_team_id);
        });
    }
}
