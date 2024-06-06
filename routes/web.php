<?php

use App\Livewire\Posts\CreatePost;
use App\Livewire\Posts\ListPosts;
use App\Livewire\Categories\ListCategories;
use App\Livewire\Categories\CreateCategory;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {
        Route::get('/', function () {
            return view('welcome');
        });

        Route::get('posts', ListPosts::class);
        Route::get('posts/create', CreatePost::class)->name('create.posts');

        Route::get('categories', ListCategories::class);
        Route::get('categories/create', CreateCategory::class)->name('create.categories');
    });
}
