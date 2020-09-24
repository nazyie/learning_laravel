<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RouteController;
use App\Http\Controllers\MiddlewareController;

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
