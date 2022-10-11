<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
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


Route::post('/broadcasting/auth', function () {
    return Auth::user();
});

Auth::routes();
Route::middleware('auth')->group(function (){
    Route::get('/', function () {

        return response(view('welcome'))->withCookie(cookie()->forever('user_id',1));
    });
    Route::get("/test", function (){
        $user = User::find(1);
        //dd(\auth()->id());
        event(new \App\Events\Test(auth()->id(), $user));
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

