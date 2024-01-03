<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GoogleloginController;
use App\Http\Controllers\UserController;

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



Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('post/{posts}', [PostController::class, 'show']);

Route::post('post/{posts}/comments', [CommentController::class, 'store']);

Route::get('categories/{category:slug}', [CategoryController::class, 'indexCat']);

Route::get('user/{user}', [UserController::class, 'posts']);

Route::get('/allUsers', [UserController::class, 'adminUser'])->middleware('admin')->name('users');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->name('login')->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::get('/login/google', [GoogleloginController::class, 'redirectToGoogle']);
Route::get('/login/google/callback',  [GoogleloginController::class, 'handleGoogleCallback']);

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('admin/post/create' , [PostController::class , 'create']);//->middleware('admin');
Route::post('admin/post' ,[PostController::class , 'store']);//->middleware('admin');

Route::get('author-profile/{user}' , [UserController::class , 'authorProfile'])->name('author-profile')->middleware('auth');

Route::get('editPost/{posts}', [UserController::class , 'editPostCreate'])->name('editPost');
Route::post('/posts/{id}/edit', [UserController::class , 'editPost'])->name('posts.edit');

Route::delete('/posts/{id}', [UserController::class , 'destroy'])->name('posts.destroy');


Route::post('/feedback', [UserController::class, 'Feedback'])->name('feedback.store');
Route::post('/stars/{posts}', [PostController::class, 'Rating'])->name('stars.store');


// or// foreach ($files as $file) {
// //     $document = YamlFrontMatter::parseFile($file);
// //     $posts[] = new Post(
// //         $document->title,
// //         $document->date,
// //         $document->excerpt,
// //         $document->body(),
// //         $document->slug
// //     );

// }

// Route::get('post', function () {
//     return view('post');
// });
