<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\LoginController;
use App\Http\Controllers\Web\UsersController;


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

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('web.login.store');
Route::get('/logout', [LoginController::class, 'destroy'])->name('web.login.destroy');


Route::middleware(['auth'])->group(function () {

    Route::get('/users', [UsersController::class, 'index'])->name('web.users.index');
    Route::get('/users/{id}', [UsersController::class, 'show'])->name('web.users.show');

});
