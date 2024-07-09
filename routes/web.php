<?php

use App\Livewire\Posts\ListPosts;
use App\Livewire\Posts\CreatePost;
use App\Livewire\Posts\UpdatePost;
use App\Livewire\CountDown;
use App\Livewire\Chatbot;
use Illuminate\Support\Facades\Route;
use App\Livewire\Categories\CreateCategory;
use App\Livewire\Categories\ListCategories;
use App\Livewire\Dashboard\Dashboard;
use App\Livewire\Posts\ShowPost;

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
    // Route::group(function () {
        Route::get('/', function () {
            return view('welcome');
        });

        Route::get('posts', ListPosts::class)->name('posts.index')->lazy(enabled: false);
        Route::get('posts/create', CreatePost::class)->name('posts.create');
        Route::get('posts/{post}/edit', UpdatePost::class)->name('posts.edit');
        Route::get('posts/{post}/show', ShowPost::class)->name('posts.show')->middleware('auth');

        Route::get('count-down', CountDown::class);
        Route::get('chatbot', Chatbot::class);

        Route::get('categories', ListCategories::class);
        Route::get('categories/create', CreateCategory::class)->name('create.categories');


        Route::get('dashboard', Dashboard::class)->name('dashboard.index');
    // });

    Route::get('/login', function ()  {
        return redirect()->away('http://sso.com/login');
    })->name('login');
