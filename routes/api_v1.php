<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\TicketController;
use App\Http\Controllers\Api\V1\UserController;

Route::middleware('auth:sanctum')->group(function () {

  Route::apiResources([
    'tickets'   => TicketController::class,
    'users'     => UserController::class,
  ]);
  
});
