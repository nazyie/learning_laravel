<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RouteController;
use App\Http\Controllers\MiddlewareController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\LearningResourceController;
use App\Http\Controllers\ResponsesController;
use App\Http\Controllers\URLGenerationController;
use App\Http\Controllers\ViewController;

Route::get('/', function () {
    return view('welcome');
});

/////////////////
// Web Routing //
/////////////////

Route::get('/lesson-1/routing', [RouteController::class, 'index']);
Route::match(['get','post'], '/lesson-1/routing-multiple-method', [RouteController::class, 'about']);
Route::any('/lesson-1/routing-any-method', [RouteController::class, 'routing_any_method']);

Route::redirect('/lesson-1/redirect', '/');
Route::redirect('/lesson-1/redirect-with-code', '/', 302);

Route::view('/lesson-1/view-route', 'lesson-1/sample-view');
Route::view('/lesson-1/view-route-with-data', 'lesson-1/sample-view', ['name' => 'Engku Nazri']);

Route::get('/lesson-1/{optional_param?}', [RouteController::class, 'optional']);

Route::get('/lesson-1/{id}', function ($id) {
  return 'User'.$id;
});

////////////////
// Middleware //
////////////////

Route::get('/lesson-2/middleware', [MiddlewareController::class, 'index']);
Route::get('lesson-2/middleware-testing', 
  ['middleware' => 'carCheck', function() {
    return 'You can access the car from router';
  }]
);

////////////////
// Controller //
////////////////

Route::get('/lesson-3/basic-controller', [LearningController::class, 'starter']);

// resource controller
Route::get('/lesson-3/resource', [LearningResourceController::class, 'index']);
Route::get('/lesson-3/resource/create', [LearningResourceController::class, 'create']);
Route::post('/lesson-3/resource', [LearningResourceController::class, 'store']);
Route::get('/lesson-3/resource/{user}/edit', [LearningResourceController::class, 'edit']);
Route::patch('/lesson-3/resource/{user}', [LearningResourceController::class, 'update']);
Route::delete('/lesson-3/resource/{user}', [LearningResourceController::class, 'delete']);

///////////////////
// HTTP response //
///////////////////

Route::get('/lesson-5/response/string', [ResponsesController::class, 'string']);
Route::get('/lesson-5/response/array', [ResponsesController::class, 'array']);
Route::get('/lesson-5/response/response-object', [ResponsesController::class, 'responseObject']);


Route::get('/lesson-5/response/redirect/{type}', [ResponsesController::class, 'redirects']);
Route::get('/lesson-5/response/view', [ResponsesController::class, 'view']);
Route::get('/lesson-5/response/json', [ResponsesController::class, 'json']);

//////////
// View //
//////////

Route::get('/lesson-6/view', [ViewController::class, 'index']);

////////////////////
// URL Generation //
////////////////////

Route::get('/lesson-7/index', [URLGenerationController::class, 'index'])->name('url.name');
Route::get('/lesson-7/signedURL', [URLGenerationController::class, 'create']);
Route::get('/lesson-7/tempURL', [URLGenerationController::class, 'createTemporarySignedRoute']);
