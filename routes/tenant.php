<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\CheckTenantUserMiddleware;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    'auth:sanctum',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
    CheckTenantUserMiddleware::class,
])->group(function () {
    Route::get('/', function () {
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('tasks', TaskController::class);
});
