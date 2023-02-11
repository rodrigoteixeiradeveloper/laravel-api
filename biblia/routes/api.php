<?php

use App\Http\Controllers\IdiomaController;
use App\Http\Controllers\TraducaoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestamentoController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\VersiculoController;
use App\Http\Controllers\AuthController;

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

//Route::post('/testamento', [TestamentoController::class, 'store']);
//Route::get('/testamento', [TestamentoController::class, 'index']);
//Route::get('/testamento/{id}', [TestamentoController::class, 'show']);
//Route::put('/testamento/{id}', [TestamentoController::class, 'update']);
//Route::delete('/testamento/{id}', [TestamentoController::class, 'destroy']);

//Route::apiResource('versiculo', VersiculoController::class);
//Route::apiResource('livro', LivroController::class);
//Route::apiResource('testamento', TestamentoController::class);

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::apiResources([
        'versiculo' => VersiculoController::class,
        'livro' => LivroController::class,
        'testamento' => TestamentoController::class,
        'traducao' => TraducaoController::class,
        'idioma' => IdiomaController::class,
    ]);

    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
