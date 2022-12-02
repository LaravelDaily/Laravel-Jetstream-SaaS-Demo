<?php

namespace App\Http\Responses;

use Stancl\Tenancy\Database\Models\Domain;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class RegisterResponse implements RegisterResponseContract
{
    public function toResponse($request)
    {
        $tenant = auth()->user()->tenants()->first();

        $domain = Domain::findOrFail($tenant->id, 'domain');

        return redirect()->away('http://' . $domain->domain . '/dashboard');
    }
}
