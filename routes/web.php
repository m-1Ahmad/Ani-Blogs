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
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
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
});
Route::get('email/verify','Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}','Auth\VerificationController@verify')->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->middleware(['auth'])->name('verification.resend');