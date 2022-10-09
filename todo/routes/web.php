<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
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

//トップ画面
Route::get('/', [TodoController::class, 'index'])->middleware('auth');
Route::post('/', [TodoController::class, 'index'])->middleware('auth');


//検索画面
Route::get('/find', [TodoController::class, 'find'])->middleware('auth');
Route::post('/find', [TodoController::class, 'find'])->middleware('auth');
Route::get('/search', [TodoController::class, 'find'])->middleware('auth');
Route::post('/search', [TodoController::class, 'search'])->middleware('auth');


//作成
Route::post('/create', [TodoController::class, 'create']);
//更新
//Route::post('/update', [TodoController::class, 'update']);
Route::post('/update{id}', [TodoController::class, 'update'])->name('Todo.update');
//削除
Route::post('/remove{id}', [TodoController::class, 'remove'])->name('Todo.remove');

//ログアウト
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('Todo.destroy');


//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
