<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\Cast\Void_;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(HomeController::class)
->prefix('/home')
->name('home.')
->group(static function():void{
route::get('','home')->name('main');

});

Route::controller(QuizController::class)
->prefix('/quiz')
->name('quiz.')
->group(static function(): void{
    route::get('/question','quiz_form')->name('form');
    route::post('/result','result')->name('result');
    route::post('','process')->name('process');
    route::get('/start','start')->name('start');
    
    //route::post('/start','start')->name('start');
   
});

Route::controller(LibraryController::class)
->prefix('library')
->name('library.')
->group(static function(): void{
    route::get('/create','add_characters')->name('add_characters');
    route::post('/create','create')->name('create');
    route::get('/characters','show_characters')->name('characters');
    route::get('','library')->name('main');
});


Route::controller(UserController::class)
->prefix('/user')
->name('user.')
->group(static function(): void{
    route::get('/register','register_form')->name('register_form');
    route::post('/register','register')->name('register');
    route::get('/login','login_form')->name('login_form');
    route::post('/login','login')->name('login');
    route::post('/logout','logout')->name('logout');
});

