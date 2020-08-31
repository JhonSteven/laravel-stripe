<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});
// Route::post();
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('users', function () {
    if(Auth::check() && request()->ajax())
    {
        return response()->json(['users'=>\App\User::all()]);
    }
    return response()->json(['errors' => 'Hola mundo']);
});
Route::get('api/user', function () {
    return Auth::user();
})->middleware(['auth','auth.basic.once']);