<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
  Route::post('/login',function(Request $request){
    $credentials= $request->only(['email','password']);

    if(!$token = auth()->attempt($credentials)){
      abort (401);
    }

    return response()->json([
      'data'=> [
          'token'=> $token,
          'token_type' => 'bearer',
          'expires_in' => auth()->factory()->getTTL() * 60

      ]
      ]);
  });

  Route::get('/products', [ProdutoController::class, 'index'])->middleware('auth');

  Route::post('/products', [ProdutoController::class, 'store'])->middleware('auth');

  Route::get('/products/{id}', [ProdutoController::class, 'show'])->middleware('auth');

  Route::put('/products/{id}/update', [ProdutoController::class, 'update'])->middleware('auth');

  Route::delete('/products/{id}/delete', [ProdutoController::class, 'destroy'])->middleware('auth');

  Route::middleware('api')->get('/user', function (Request $request) {
      return $request->user();
  });

  Route::post('/create-user',[UserController::class, 'createUser']);
