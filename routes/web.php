<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
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



Route::get('/', [ServiceController::class, 'index'])->name('index');
Route::get('/reginnnnnnnnster', [ServiceController::class, 'returnIndex']);
Route::get('/sobre', [ServiceController::class, 'info']);
// Route::get('/events/{id}', [ServiceController::class,'show']);
Route::get('/listService', [ServiceController::class, 'listService']);
// ROTAS DO DASHBOARD DO PROJECT 

Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware(
    'auth'
);
Route::post('/events', [ServiceController::class, 'store'])->middleware('auth');

Route::get('/create', [ServiceController::class, 'create'])->middleware('auth');

Route::get('/dashboard', [ServiceController::class, 'dashboard'])->middleware(
    'auth'
);

Route::get('/events/edit/{id}', [ServiceController::class, 'edit'])->middleware(
    'auth'
);

Route::put('/events/update/{id}', [
    ServiceController::class,
    'update',
])->middleware('auth');

Route::delete('/events/{id}', [
    ServiceController::class,
    'destroy',
])->middleware('auth');


// CRIANDO ROTA DAS PAGES DO SITE 
Route::get('/pg', [PageController::class, 'pages'])->middleware('auth');

Route::post('/pages', [PageController::class, 'add'])->middleware('auth');


Route::get('/pages/edit/{id}', [PageController::class, 'editPage'])->middleware(
    'auth'
);

Route::put('/pages/update/{id}', [
    PageController::class,
    'atualiza',
])->middleware('auth');

Route::delete('/pages/{id}', [
    PageController::class,
    'delete',
])->middleware('auth');
