<?php

use App\Http\Controllers\agentController;
use App\Http\Controllers\classController;
use App\Http\Controllers\companyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\subjectController;
use App\Http\Controllers\teacherController;
use App\Http\Controllers\transmissionController;
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
Route::post('save/company1',[companyController::class,'saveCompany1'])->name('save.company1');

Route::post('save/agent',[agentController::class,'saveAgent'])->name('save.agent');
Route::get('agent/cdetails/{id?}/{cid?}',[agentController::class,'cdetails'])->name('agent.cdetails');

Route::get('add/transmittion',[companyController::class,'addTransmittion'])->name('add.transmittion');
// Route::get('add/transmittion/{id}/{oId}',[transmissionController::class,'addTransmittion_new_transmission'])->name('add.transmittion.id');
Route::post('add/trasmission34',[transmissionController::class,'addTransmittion_new_transmission'])->name('add.transmittion.id');
Route::get('ad/trasmission/{id?}/{cid?}',[companyController::class,'addTransmission0'])->name('add.transmittion0');

Route::post('save/transmittion',[companyController::class,'addTransmission'])->name('transmission.save');

Route::get('list/transmission',[transmissionController::class,'listTransmission'])->name('list.transmission');
Route::get('company/transmission/{id?}',[companyController::class,'companyTransmission'])->name('company.transmission');

Route::get('company/agent/{id?}',[agentController::class,'companyAgent'])->name('company.agent');
 Route::get('agent/details/{id?}',[agentController::class,'cagent'])->name('agent.details');

Route::get('list/company',[companyController::class,'index'])->name('list.company');
Route::get('details/company/{id}',[companyController::class,'details'])->name('details.company');
Route::get('edit/company{id}',[companyController::class,'edit12'])->name('edit.company');
Route::get('company/edit/{id}',[companyController::class,'edit'])->name('company.edit');
Route::post('update/company',[companyController::class,'update'])->name('update.company');

Route::post('company/{id}')->name('order.create');

Route::get('transmission/detials',[agentController::class,'traDetails'])->name('transmission.details');
Route::get('programe/transmission',[transmissionController::class,'program'])->name('programe.transmission');
Route::get('transmission/status',[transmissionController::class,'changeStatus'])->name('transmission.status');
Route::post('transmission/save',[transmissionController::class,'saveTransmission'])->name('transmission.save1');
Route::get('transmission/program/{id?}',[transmissionController::class,'program1'])->name('transmission.program');
Route::get('transmission/rate',[transmissionController::class,'changeRate'])->name('transmission.rate');
Route::get('order/transmission/{id}',[transmissionController::class,'orderTransmissions'])->name('order.transmission');
Route::get('transmission/delete',[transmissionController::class,'delete'])->name('transmission.delete');
Route::get('transmission/edit',[transmissionController::class,'edit'])->name('transmission.edit');
Route::post('transmission/saveEdit',[transmissionController::class,'saveEdit'])->name('transmission.saveEdit');
Route::get('transmission/show/{id}',[transmissionController::class,'show'])->name('transmission.show');
Route::get('all/transmission',[transmissionController::class,'allTransmissino'])->name('all.transmission');


Route::get('company/agents/{id}',[agentController::class,'companyAgent'])->name('list.cagent');
Route::post('save/agents',[agentController::class,'saveAgent'])->name('save.agentd');
Route::get('order/status/{id?}',[companyController::class,'orderStatus'])->name('order.status');
Route::get('get/country',[companyController::class,'getCountry'])->name('get.country');
 

Route::get('test',function(){
    return view('test');
});
