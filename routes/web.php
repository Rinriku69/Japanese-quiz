<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\Cast\Void_;

Route::get('/', function () {
    return view('home.main');
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
    route::get('/intermediate','intermediate_quiz')->name('intermediate');
    route::get('/beginner','beginner_quiz')->name('beginner');
    route::get('/result','result')->name('result');
    route::get('/result_text/{quiz_level}','result_text')->name('result-text');
    route::post('','process')->name('process');
    route::post('/text-process','text_process')->name('text-process');
    route::post('/start','start')->name('start');
    route::post('/restart','restart')->name('restart');
    route::get('/drawing','drawing_quiz')->name('drawing');
    route::get('/drawing','drawing_quiz')->name('drawing');
    route::get('/text','text_quiz')->name('text');
    route::get('/word-text','word_text_quiz')->name('word-text');
    route::post('/word-text-process','process_word_text_quiz')->name('word-text-process');
   
});

Route::controller(LibraryController::class)
->prefix('library')
->name('library.')
->group(static function(): void{
    route::get('/create','add_characters')->name('add_characters');
    route::post('/create','create')->name('create');
    route::get('/create-word','add_word')->name('add_word');
    route::get('/create-word','add_word')->name('add_word');
    route::post('/create-word','store_word')->name('store_word');
    route::get('/words','show_words')->name('words');
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
    route::get('/profile','profile')->name('profile')->middleware('auth');
    route::get('/attempt/{id}', 'show_attempt')->name('attempt.show')->middleware('auth');
    route::delete('/attempt/{id}', 'destroy_attempt')->name('attempt.destroy')->middleware('auth');
});


