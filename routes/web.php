<?php

use App\Http\Controllers\agentController;
use App\Http\Controllers\classController;
use App\Http\Controllers\companyController;
use App\Http\Controllers\CompanyFineController;
use App\Http\Controllers\LicenseExtensionController;
use App\Http\Controllers\RegistrationRightController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\subjectController;
use App\Http\Controllers\teacherController;
use App\Models\RegistrationRight;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Finder\Finder;

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
Route::get('ad/trasmission/{id}',[companyController::class,'addTransmission0'])->name('add.transmittion0');

Route::post('save/transmittion',[companyController::class,'addTransmission'])->name('transmission.save');

Route::get('list/transmission',[companyController::class,'listTransmission'])->name('list.transmission');
Route::get('company/transmission/{id?}',[companyController::class,'companyTransmission'])->name('company.transmission');

Route::get('company/agent/{id?}',[companyController::class,'companyAgent'])->name('company.agent');
// Route::get('agent/details/{id?}',[agentController::class,'cagent'])->name('agent.details');

Route::get('list/company',[companyController::class,'index'])->name('list.company');
Route::get('details/company/{id}',[companyController::class,'details'])->name('details.company');
Route::get('saveRight/company/{id}',[RegistrationRightController::class,'show'])->name('saveRight.company');
Route::get('oldRegRight.company/{id}',[RegistrationRightController::class,'OldRight'])->name('oldRegRight.company');
Route::post('createsaveRight/company/{id}',[RegistrationRightController::class,'store'])->name('createsaveRight.company');
route::get('EditRegRight/company/{id}',[RegistrationRightController::class,'edit'])->name('EditRegRight.company');
Route::put('updatesaveRight/company/{id}',[RegistrationRightController::class,'update'])->name('updatesaveRight.company');
Route::post('createFine/company/{id}',[CompanyFineController::class,'store'])->name('createFine.company');
Route::get('licence/company/{id}',[LicenseExtensionController::class,'show'])->name('licence.company');
Route::delete('delteLicenseExt/company/{id}',[LicenseExtensionController::class,'destroy'])->name('delteLicenseExt.company');
Route::post('CreatelicenseExtension/company/{id}',[LicenseExtensionController::class,'store'])->name('CreatelicenseExtension.company');
Route::get('giveFrequency/{provinceId}/{companyId}',[LicenseExtensionController::class,'frequencySearch'])->name('giveFrequency');
Route::get('licenseExtEdit/company/{id}',[LicenseExtensionController::class,'edit'])->name('licenseExtEdit.company');
Route::get('EditlicenseExtension/company/{id}',[LicenseExtensionController::class,'update'])->name('EditlicenseExtension.company');
Route::get('fine/company/{id}',[CompanyFineController::class,'show'])->name('fine.company');
Route::delete('delteFine/company/{id}',[CompanyFineController::class,'destroy'])->name('delteFine.company');
Route::PUT('UpdateFine/company/{id}',[CompanyFineController::class,'update'])->name('UpdateFine.company');
Route::get('EditFine/company/{id}',[CompanyFineController::class,'edit'])->name('EditFine.company');
Route::get('edit/company{id}',[companyController::class,'edit'])->name('edit.company');

Route::post('company/{id}')->name('order.create');

Route::get('transmission/detials',[agentController::class,'traDetails'])->name('transmission.details');
