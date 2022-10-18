<?php

use App\Http\Controllers\agentController;
use App\Http\Controllers\classController;
use App\Http\Controllers\companyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\subjectController;
use App\Http\Controllers\teacherController;
use Illuminate\Support\Facades\Route;

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

Route::get('add/company',[companyController::class,'addCompany'])->name('add.company');
Route::post('save/company',[companyController::class,'saveCompnay'])->name('save.company');

Route::post('save/agent',[agentController::class,'saveAgent'])->name('save.agent');
Route::get('agent/cdetails/{id}',[agentController::class,'cdetails'])->name('agent.cdetails');

Route::get('add/transmittion',[companyController::class,'addTransmittion'])->name('add.transmittion');

Route::post('save/transmittion',[companyController::class,'addTransmission'])->name('transmission.save');

Route::get('list/transmission',[companyController::class,'listTransmission'])->name('list.transmission');
Route::get('company/transmission/{id?}',[companyController::class,'companyTransmission'])->name('company.transmission');

Route::get('company/agent/{id?}',[companyController::class,'companyAgent'])->name('company.agent');
Route::get('agent/details/{id?}',[agentController::class,'cagent'])->name('agent.details');

Route::get('list/company',[companyController::class,'index'])->name('list.company');
Route::get('details/company/{id}',[companyController::class,'details'])->name('details.company');
Route::get('edit/company{id}',[companyController::class,'edit'])->name('edit.company');

