<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DocsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\Frontend\NewsController as FrontendNewsController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, "index"])->name('home');
Route::get('/events', [EventController::class, 'listEvent'])->name('events');
Route::get('/news', [FrontendNewsController::class, 'index'])->name('news');
Route::get('/news/{id}', [FrontendNewsController::class, 'show'])->name('news.show');
Route::get('/download', [DocsController::class, 'listDocs'])->name('download');
Route::get('/facilities', [FacilityController::class, 'listFacilities'])->name('facilities');
Route::get('/tenants', [TenantController::class, 'listTenants'])->name('tenants');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::prefix('admin')->middleware('auth')->group(function () {
   Route::get('/facilites', [FacilityController::class, 'index'])->name('facility.index');
   Route::post('/facilites', [FacilityController::class, 'store'])->name('facility.store');
   Route::post('/facilites/update/{id}', [FacilityController::class, 'update'])->name('facility.update');
   Route::delete('/facilites/delete{id}', [FacilityController::class, 'delete'])->name('facility.destroy');

   Route::get('/events', [EventController::class, 'index'])->name('event.index');
   Route::post('/events', [EventController::class, 'store'])->name('event.store');
   Route::post('/events/{id}', [EventController::class, 'update'])->name('event.update');
   Route::delete('/events/delete/{id}', [EventController::class, 'delete'])->name('event.destroy');

   Route::get('/tenants', [TenantController::class, 'index'])->name('tenant.index');
   Route::post('/tenants', [TenantController::class, 'store'])->name('tenant.store');
   Route::post('/tenants/{id}', [TenantController::class, 'update'])->name('tenant.update');
   Route::delete('/tenants/delete/{id}', [TenantController::class, 'destroy'])->name('tenant.destroy');

   Route::get('/news', [NewsController::class, 'index'])->name('news.index');
   Route::post('/news', [NewsController::class, 'store'])->name('news.store');
   Route::post('/news/{id}', [NewsController::class, 'update'])->name('news.update');
   Route::delete('/news/delete/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

   Route::get('/docs', [DocsController::class, 'index'])->name('document.index');
   Route::post('/docs', [DocsController::class, 'store'])->name('docs.store');
   Route::delete('/docs/{id}', [DocsController::class, 'destroy'])->name('docs.destroy');

   Route::get('/accounts', [AccountController::class, "index"])->name('account.index')->middleware('superadmin');
   Route::delete('/accounts/{id}', [AccountController::class, 'destroy'])->name('account.destroy')->middleware('superadmin');
   Route::post('/accounts', [AccountController::class, 'store'])->name('account.store')->middleware('superadmin');

});

require __DIR__.'/auth.php';
