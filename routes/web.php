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

Route::get('list/company',[companyController::class,'index'])->name('list.company');
Route::get('details/company/{id}',[companyController::class,'details'])->name('details.company');
Route::get('edit/company{id}',[companyController::class,'edit'])->name('edit.company');

