<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Login;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
// use App\Http\Controllers\AdminCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [LoginController::class, 'index']);
Route::get('/', [PostController::class, 'all']);
Route::get('/cari', [PostController::class, 'cari']);
Route::get('/buku/{post}', [PostController::class, 'show']);


Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        "active" => "categories",
        'category' => Category::all()
    ]);
});



Route::get('/categories/{category:slug}', function (Category $category) {
    return view('home', [
        'title' => "Post By Category :" . $category->name,
        "active" => "categories",
        'post' => $category->post->load('category', 'user'),
        // 'category' => $category->name
    ]);
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard/post/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/post', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/users', AdminUserController::class)->except('show')->middleware('admin');
Route::get('/dashboard/users/archive', [AdminUserController::class, 'archive'])->middleware('admin');
Route::post('/dashboard/users/{user}/restore', [AdminUserController::class, 'restore'])->withTrashed()->middleware('admin');
Route::delete('/dashboard/users/{user}/lost', [AdminUserController::class, 'lost'])->withTrashed()->middleware('admin');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');


// Route::get('/categories', function () {
//     return view('categories', [
//         'title' => 'Post Categories',
//         'category' => Category::all()
//     ]);
// });

// Route::get('/author/{author:username}', function (User $author) {
//     // return "aa";
//     return view('home', [
//         'title' => 'Post By Author ' . $author->name,
//         "active" => "blog",
//         'post' => $author->post->load('category', 'user')
//     ]);
// });

// Route::get('/blog', function () {
//     return view('home', [
//         "post" => Post::all(
//     ]);
// });
