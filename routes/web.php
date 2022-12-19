<?php

use App\Http\Controllers\agentController;
use App\Http\Controllers\classController;
use App\Http\Controllers\companyController;
use App\Http\Controllers\CompanyFineController;
use App\Http\Controllers\LicenseExtensionController;
use App\Http\Controllers\RegistrationRightController;

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

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('dashboard');
    Route::get('add/company', [companyController::class, 'addCompany'])->name('add.company');
    Route::post('save/company', [companyController::class, 'saveCompnay'])->name('save.company');
    Route::post('save/company1', [companyController::class, 'saveCompany1'])->name('save.company1');

    Route::post('save/agent', [agentController::class, 'saveAgent'])->name('save.agent');
    Route::get('agent/cdetails/{id?}', [agentController::class, 'cdetails'])->name('agent.cdetails');

    Route::get('add/transmittion', [companyController::class, 'addTransmittion'])->name('add.transmittion');
    // Route::get('add/transmittion/{id}/{oId}',[transmissionController::class,'addTransmittion_new_transmission'])->name('add.transmittion.id');
    Route::post('add/trasmission34', [transmissionController::class, 'addTransmittion_new_transmission'])->name('add.transmittion.id');
    Route::get('ad/trasmission/{id?}/{cid?}', [companyController::class, 'addTransmission0'])->name('add.transmittion0');

    Route::post('save/transmittion', [companyController::class, 'addTransmission'])->name('transmission.save');

    Route::get('comopanies/orders', [transmissionController::class, 'listTransmission'])->name('companies.orders');
    Route::get('list/transmission', function () {
        return view('transmittion.list');
    })->name('list.transmission');
    Route::get('company/transmission/{id?}', [companyController::class, 'companyTransmission'])->name('company.transmission');

    Route::get('company/agent/{id?}', [agentController::class, 'companyAgent'])->name('company.agent');
    Route::get('agent/details/{id?}', [agentController::class, 'cagent'])->name('agent.details');

    Route::get('list/company', [companyController::class, 'index'])->name('list.company');
    Route::get('users/index', [companyController::class, 'index1'])->name('users.index');
    Route::get('details/company/{id}', [companyController::class, 'details'])->name('details.company');
    Route::get('saveRight/company/{id}', [RegistrationRightController::class, 'show'])->name('saveRight.company');
    Route::get('oldRegRight.company/{id}', [RegistrationRightController::class, 'OldRight'])->name('oldRegRight.company');
    Route::post('createsaveRight/company/{id}', [RegistrationRightController::class, 'store'])->name('createsaveRight.company');
    route::get('EditRegRight/company/{id}', [RegistrationRightController::class, 'edit'])->name('EditRegRight.company');
    Route::put('updatesaveRight/company/{id}', [RegistrationRightController::class, 'update'])->name('updatesaveRight.company');
    Route::post('createFine/company/{id}', [CompanyFineController::class, 'store'])->name('createFine.company');
    Route::get('licence/company/{id}', [LicenseExtensionController::class, 'show'])->name('licence.company');
    Route::delete('delteLicenseExt/company/{id}', [LicenseExtensionController::class, 'destroy'])->name('delteLicenseExt.company');
    Route::post('CreatelicenseExtension/company/{id}', [LicenseExtensionController::class, 'store'])->name('CreatelicenseExtension.company');
    Route::get('giveFrequency/{provinceId}/{companyId}', [LicenseExtensionController::class, 'frequencySearch'])->name('giveFrequency');
    Route::get('licenseExtEdit/company/{id}', [LicenseExtensionController::class, 'edit'])->name('licenseExtEdit.company');
    Route::get('FineExt.company/company/{id}', [LicenseExtensionController::class, 'Fine'])->name('FineExt.company');
    Route::get('EditlicenseExtension/company/{id}', [LicenseExtensionController::class, 'update'])->name('EditlicenseExtension.company');
    Route::get('oldlicenseExt/company/{id}', [LicenseExtensionController::class, 'index'])->name('oldlicenseExt.company');

    Route::get('fine/company/{id}', [CompanyFineController::class, 'show'])->name('fine.company');
    Route::get('fine/show/{id}', [CompanyFineController::class, 'show1'])->name('fine.show');
    Route::delete('delteFine/company/{id}', [CompanyFineController::class, 'destroy'])->name('delteFine.company');
    Route::PUT('UpdateFine/company/{id}', [CompanyFineController::class, 'update'])->name('UpdateFine.company');
    Route::get('EditFine/company/{id}', [CompanyFineController::class, 'edit'])->name('EditFine.company');
    Route::get('edit/company{id}', [companyController::class, 'edit'])->name('edit.company');

    Route::post('company/{id}')->name('order.create');
    Route::post('license/add', [companyController::class, 'addLicense'])->name('add.license');
    Route::get('license/edit/{id}', [companyController::class, 'editLicense'])->name('license.edit');
    Route::post('license/update', [companyController::class, 'updateLicese'])->name('license.update');
    Route::get('license/delete', [companyController::class, 'deleteLicense'])->name('license.delete');

    Route::get('transmission/detials', [agentController::class, 'traDetails'])->name('transmission.details');
    Route::get('programe/transmission', [transmissionController::class, 'program'])->name('programe.transmission');
    Route::get('transmission/status', [transmissionController::class, 'changeStatus'])->name('transmission.status');
    Route::post('transmission/save', [transmissionController::class, 'saveTransmission'])->name('transmission.save1');
    Route::get('transmission/program/{id?}', [transmissionController::class, 'program1'])->name('transmission.program');
    Route::get('transmission/rate', [transmissionController::class, 'changeRate'])->name('transmission.rate');
    Route::get('order/transmission/{id}', [transmissionController::class, 'orderTransmissions'])->name('order.transmission');
    Route::get('transmission/delete', [transmissionController::class, 'delete'])->name('transmission.delete');
    Route::get('transmission/edit', [transmissionController::class, 'edit'])->name('transmission.edit');
    Route::post('transmission/saveEdit', [transmissionController::class, 'saveEdit'])->name('transmission.saveEdit');
    Route::get('transmission/show/{id}', [transmissionController::class, 'show'])->name('transmission.show');
    Route::get('all/transmission', [transmissionController::class, 'allTransmissino'])->name('all.transmission');
    Route::post('add/nTransmission', [transmissionController::class, 'addNTransmission'])->name('add.ntransmission');


    Route::get('company/agents/{id}', [agentController::class, 'companyAgent'])->name('list.cagent');
    Route::post('save/agents', [agentController::class, 'saveAgent'])->name('save.agentd');
    Route::get('order/status/{id?}', [companyController::class, 'orderStatus'])->name('order.status');
    Route::get('get/country', [companyController::class, 'getCountry'])->name('get.country');
    Route::get('load/agent/{id}', [agentController::class, 'loadAgent'])->name('loade.agent');


    Route::get('orders/details/{id}', [orderController::class, 'details'])->name('orders.details');

    Route::get('users/index', [companyController::class, 'index1'])->name('users.index');

    Route::get('show/orders/{id?}', [orderController::class, 'getOrder'])->name('company.orders');
    Route::get('orders/program/{id?}', [orderController::class, 'program'])->name('order.program');
});
