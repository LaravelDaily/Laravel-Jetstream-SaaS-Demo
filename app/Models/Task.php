<?php

namespace App\Models;

use App\Models\Scopes\TaskOwnerScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Task extends Model
{
    use BelongsToTenant;

    protected $fillable = ['name', 'category_id', 'user_id', 'tenant_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
