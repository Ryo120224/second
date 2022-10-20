<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
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

// Route::get('/', function () {
    // return view('welcome');
// });
Route::get('/rooms',[RoomController::class,'room']);

Route::get('/', function() {
    return view('rooms/index');
});
Route::get('/rooms/create', [RoomController::class, 'create']);
Route::post('/rooms', [RoomController::class, 'store']);
Route::get('/test', function() {
    return view('app');
});
 Route::get('/chat', [RoomController::class, 'pusher']);
?>