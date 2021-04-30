<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Users\{UsersController, WorkerController, EmployerController};
use App\Http\Controllers\Api\Companies\CompaniesController;
use App\Http\Controllers\Api\Documents\DocumentsController;
use App\Http\Controllers\Api\Employees\EmployeesController;


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

Route::apiResource('worker', 	WorkerController::class,   ['except' => ["index", "show", "edit", "delete"]]);
Route::apiResource('employer',  EmployerController::class, ['except' => ["index", "show", "edit", "delete"]]);

Route::middleware('client')->name('api.')->group(function () {


	Route::apiResource('users', 		  UsersController::class);
	Route::apiResource('companies', 	  CompaniesController::class);
	Route::apiResource('employees', 	  EmployeesController::class);
	Route::apiResource('documents', 	  DocumentsController::class);
	Route::apiResource('documents.files', DocumentsFilesController::class)->only([ 'show' ]);
	
});









/*

VOCA API Design

OAuth2 using passport


/users  GET  api.users.index
/users  POST api.user.store
/users/{id} GET api.users.show
/users/{id} PATCH api.users.update
/users/{id} DELETE api.users.delete
/users/{id}/documents GET api.users.documents.index
/users/{id}/documents POST api.users.documents.store


/companies  GET  api.companies.index
/companies  POST api.user.store
/companies/{id} GET api.companies.show
/companies/{id} PATCH api.companies.update
/companies/{id} DELETE api.companies.delete
/companies/{id}/documents GET api.companies.documents.index
/companies/{id}/documents POST api.companies.documents.store

/documents/{id} GET api.documents.show
/documents/{id} PATCH api.documents.update
/documents/{id} DELETE api.documents.delete


/tasks GET api.tasks.index
/tasks POST api.tasks.store
/tasks/{id} GET api.tasks.show
/tasks/{id} PATCH api.tasks.update
/tasks/{id} DELETE api.tasks.delete
/tasks/{id}/task-users GET api.tasks.users.index
/tasks/{id}/task-users POST api.tasks.users.store
/tasks/{id}/task-users/{id} DELET api.tasks.users.store


 */
