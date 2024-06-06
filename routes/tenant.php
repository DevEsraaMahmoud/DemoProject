<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyBySubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Livewire\Posts\CreatePost;
use App\Livewire\Posts\ListPosts;
use Livewire\Livewire;

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
    InitializeTenancyBySubdomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

    // Livewire::setUpdateRoute(function ($handle) {
    //     return Route::post('/livewire/update', $handle);
    // });

    Route::get('/', function () {
        return 'This is your sub';
    });

    Route::get('posts', ListPosts::class);
    Route::get('posts/create', CreatePost::class)->name('create.posts');

});
