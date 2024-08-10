<?php

use App\Http\Controllers\MazeController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/builder', 'as' => 'builder.'], function (){
   Route::get('/maze', MazeController::class);
});
