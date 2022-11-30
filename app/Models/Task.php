<?php

namespace App\Models;

use App\Models\Scopes\TaskOwnerScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = ['name', 'category_id', 'user_id'];

    protected static function booted()
    {
        parent::booted();

        static::addGlobalScope(new TaskOwnerScope);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
