<?php

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

use App\Company;
use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

use App\Post;
use Illuminate\Support\Facades\Auth;
/*
Route::get('/hello', function () {
    return '<h1>Hello world!</h1>';
});
Route::get('/users/{id}',function($id){
    return 'This is User: '.$id;
}
*/
Route::get('/', [PagesController::class,'index']);
Route::get('/about', [PagesController::class,'about']);
Route::get('/services', [PagesController::class,'services']); 
Route::resource('posts','PostsController');
Route::get('/posts/{post}/comment','CommentsController@index')->name('comment.index');
Auth::routes();
Route::middleware(['web'])->group(function () {
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'Auth\RegisterController@register');
});
Auth::routes(['verify' => true]);
Route::middleware(['auth', 'verified'])->group(function (){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/posts/create', 'PostsController@create')->name('posts.create');
    Route::post('/posts', 'PostsController@store')->name('posts.store');
    Route::get('/posts/{id}/edit', 'PostsController@edit')->name('posts.edit');
    Route::put('/posts/{id}', 'PostsController@update')->name('posts.update');
    Route::delete('/posts/{id}', 'PostsController@destroy')->name('posts.destroy');
    Route::get('/posts/{id}/comment','CommentsController@index')->name('comment.index');
    Route::post('/posts/{id}/comment','CommentsController@store')->name('comment.store');
    Route::get('/posts/{post}/comment/create', [CommentsController::class, 'create'])->name('comment.create');
    Route::get('/posts/{post}/comment/{id}/edit', [CommentsController::class, 'edit'])->name('comment.edit');
    Route::delete('/posts/{post}/comment/{id}', [CommentsController::class, 'destroy'])->name('comment.destroy');
    Route::put('/posts/{post}/comment/{id} ', [CommentsController::class, 'update'])->name('comment.update');
});
Route::get('email/verify','Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}','Auth\VerificationController@verify')->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->middleware(['auth'])->name('verification.resend');