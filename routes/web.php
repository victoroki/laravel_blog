<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BlogController;


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

// Route::get('/', function () { 
//     return view('welcome');
// });

Route::get('/', [PostController::class, 'home'])->name('home');
Route::resource('posts', PostController::class);

Route::group(['middleware' => ['web','auth']], function () {
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('posts.comments.store');
Route::get('/home', [PostController::class, 'home'])->name('home');
Route::get('/admin/pending-blogs', [BlogController::class, 'showPendingBlogs'])->name('admin.pendingBlogs');
Route::post('/admin/blogs/{id}/approve', [BlogController::class, 'approveBlog'])->name('admin.approveBlog');
Route::post('/admin/blogs/{id}/reject', [BlogController::class, 'rejectBlog'])->name('admin.rejectBlog');

Route::get('/posts/{id}', [BlogController::class, 'show'])->name('posts.show');



});

Route::get('/list', function (){
    return view ('list');
});

Auth::routes();
