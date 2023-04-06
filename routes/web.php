<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenaiController;
use App\Http\Controllers\ChatGptController;
use App\Http\Controllers\ChatAIController;
use App\Http\Controllers\FileUploadController;


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
    return view('welcome');
});

Route::get('api/data/ask/{q}', [OpenaiController::class, 'getdata']);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/write', function () {
    $title = '';
    $content = '';
    return view('write', compact('title', 'content'));
});

Route::post('/write/generate', [OpenaiController::class, 'index']);

Route::get('api/ask/{q}', [OpenaiController::class, 'modrationApi']);
Route::get('/user-details', [CrudController::class, 'index'])->name('user-details');

// Route::get('/', [BaseController::class, 'test3']);
// Route::get('/SignUp', [CrudController::class, 'signup'])->name('signup');

Route::get('/login', [CrudController::class, 'login']);
Route::get('/registration', [CrudController::class, 'registration']);
Route::post('/register-user', [CrudController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [CrudController::class, 'loginuser'])->name('login-user');
//Route::post('/register-user', [CrudController::class, 'regUser'])->name('register-user');

Route::get('/dashboard', [CrudController::class, 'dashboard'])->middleware('isLoggedIn');

Route::get('/logout', [CrudController::class, 'logout']);

Route::get('/chatbot', function () {
    return view('chatbot');
});
Route::get('/completion', function () {
    return view('completion');
});
Route::get('/addfile', function () {
    return view('addfile');
});

Route::post('/send-message', [ChatGptController::class, 'sendMessage'])->name('send-message');

Route::post('/chatgpt', [ChatAIController::class, 'chatGpt'])->name('chatgpt');
Route::get('/uploadFile', [ChatGptController::class, 'uploadFile'])->name('uploadFile');
Route::post("api/upload", [FileUploadController::class, 'upload']);
