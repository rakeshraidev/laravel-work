<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenaiController;

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
