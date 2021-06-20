<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Users\{ UsersController, UserDocumentsController };
use App\Http\Controllers\Api\Companies\CompaniesController;
use App\Http\Controllers\Api\Documents\{ DocumentsController, FileController };
use App\Http\Controllers\Api\Employees\EmployeesController;
use App\Http\Controllers\Api\WorkerLeads\{ WorkerLeadsController, WorkerLeadDocumentsController};
use App\Http\Controllers\Api\CompanyLeads\CompanyLeadsController;

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

Route::apiResource('worker_leads',  CompanyLeadsController::class)->only([ 'store' ]);
Route::apiResource('company_leads', 	WorkerLeadsController::class)->only([ 'store' ]);

Route::middleware('auth:sanctum')->name('api.')->group(function () {
	
	/**
	 * 
	 * Routes which have the full spectrum of api endpoints
	 * 
	 */
	Route::apiResource('users', 		  		UsersController::class);
	Route::apiResource('companies', 	  		CompaniesController::class);
	Route::apiResource('employees', 	  		EmployeesController::class);


	/**
	 * 
	 * Routes that exclude a ceratin amount of endpoints from their definition.
	 * 
	 */
	Route::apiResource('worker_leads', 			WorkerLeadsController::class, 	["except" => ['store']]);
	Route::apiResource('company_leads',  		CompanyLeadsController::class, 	["except" => ['store']]);
	Route::apiResource('documents', 			DocumentsController::class, 	["except" => ['index', 'store']]);


	/**
	 * 
	 * Routes which have only one or two of the apiResource routes.
	 * 
	 */
	Route::apiResource('files', 		  		FileController::class)->only([ 'show' ]);


	/**
	 * 
	 * Routes which do not have an method we can call with laravel. These are all custom defined routes.
	 * 
	 */
	Route::get	('users/{user}/documents',  				[UserDocumentsController::class, "index"])->name("users.documents.index");
	Route::post	('users/{user}/documents', 					[UserDocumentsController::class, "store"])->name("users.documents.store");
	Route::get	('worker_leads/{worker_lead}/documents',  	[WorkerLeadDocumentsController::class, "index"])->name("worker_leads.documents.index");
	Route::post	('worker_leads/{worker_lead}/documents', 	[WorkerLeadDocumentsController::class, "store"])->name("worker_leads.documents.store");


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
