<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('ajax/messages', [ApiController::class, 'listMessage']);
Route::post('ajax/send', [ApiController::class, 'sendMessage']);
Route::get('ajax/user', [ApiController::class, 'UtilisateurEnLigne']);

require __DIR__.'/auth.php';


