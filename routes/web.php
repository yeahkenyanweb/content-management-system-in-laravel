<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Auth::routes();

/*
|--------------------------------------------------------------------------
| Dashboard (Admin Only)
|--------------------------------------------------------------------------
| Only logged-in admins can access dashboard and manage posts/comments.
| Uses main.blade.php layout.
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Admin: Posts management
    Route::prefix('posts')->name('posts.')->group(function () {
        Route::get('trash', [PostsController::class, 'trash'])->name('trash');
        Route::get('{id}/restore', [PostsController::class, 'restore'])->name('restore');
        Route::delete('{id}/force-delete', [PostsController::class, 'forceDelete'])->name('forceDelete');
    });
    Route::resource('/posts', PostsController::class);
    
    // Admin: Comments management
    Route::prefix('comments')->name('comments.')->group(function () {
        Route::get('trash', [CommentsController::class, 'trash'])->name('trash');
        Route::get('{id}/restore', [CommentsController::class, 'restore'])->name('restore');
        Route::delete('{id}/force-delete', [CommentsController::class, 'forceDelete'])->name('forceDelete');
    });
    Route::resource('/comments', CommentsController::class);
});

/*
|--------------------------------------------------------------------------
| Authenticated User Routes (Normal Users)
|--------------------------------------------------------------------------
| Logged-in users can comment on blog posts.
*/
Route::middleware(['auth'])->group(function () {
    Route::post('/comments', [CommentsController::class, 'store'])->name('comments.store');
});

/*
|--------------------------------------------------------------------------
| Public Blog Routes (Visible to Everyone)
|--------------------------------------------------------------------------
| Guests and logged-in users can view blogs.
*/
Route::get('/', [BlogController::class, 'index'])->name('index');
Route::resource('/blogs', BlogController::class)->only(['index', 'show']);

/*
|--------------------------------------------------------------------------
| Miscellaneous Testing Route
|--------------------------------------------------------------------------
*/
Route::get('/test', function () {
    $slug = ' This is The Post slug ';
    return str_replace(" ", "-", trim(strtolower($slug)));
});
