<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;


/*
|--------------------------------------------------------------------------
| Redirect Routes
|--------------------------------------------------------------------------
|
| These routes redirect the user to a different page.
|
 */

Route::get('', function () {
    return redirect()->route('web.welcome.show');
});



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


Route::view('/welcome', 'pages/welcome')->name('web.welcome.show');

Route::get('/login', [LoginController::class, 'create'])->name('web.login.create');
Route::post('/login', [LoginController::class, 'store'])->name('web.login.store');
Route::post('/logout', [LoginController::class, 'destroy'])->name('web.login.destroy');


Route::middleware(['auth'])->group(function () {

    Route::get('/users', [UsersController::class, 'index'])->name('api.users.index');
    Route::get('/users/{id}', [UsersController::class, 'show'])->name('api.users.show');

});
