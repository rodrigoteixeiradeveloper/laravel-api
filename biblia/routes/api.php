<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestamentoController;
use App\Http\Controllers\LivroController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/testamento', [TestamentoController::class, 'store']);
Route::get('/testamento', [TestamentoController::class, 'index']);
Route::get('/testamento/{id}', [TestamentoController::class, 'show']);
Route::put('/testamento/{id}', [TestamentoController::class, 'update']);
Route::delete('/testamento/{id}', [TestamentoController::class, 'destroy']);

Route::post('/livro', [LivroController::class, 'store']);
Route::get('/livro', [LivroController::class, 'index']);
Route::get('/livro/{id}', [LivroController::class, 'show']);
Route::put('/livro/{id}', [LivroController::class, 'update']);
Route::delete('/livro/{id}', [LivroController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
