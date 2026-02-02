<?php

use App\Models\CustType;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustTypeController;
use App\Http\Controllers\materialController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\ThingController;

use App\Models\Customer;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.register');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/dashboard', function () {
    return view('frontend.dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



//these are the Customer routes
Route::resource('Customer', CustomerController::class);
Route::get('/customers/trashed', [CustomerController::class, 'trashed'])
    ->name('Customer.trashed');
    Route::post('/customers/{id}/restore', [CustomerController::class, 'restore'])
    ->name('Customer.restore');
Route::delete('/customers/{id}/delete', [CustomerController::class, 'delete'])->name('Cutomer.delete');
Route::get('CustomerFinancial', [CustomerController::class, 'customerFinancial'])->name('Customer.financial');
Route::get('CustomerThing', [CustomerController::class, 'customerThing'])->name('Customer.thing');

//these are Financial routes
Route::get('financial/{customer_id}', [FinancialController::class, 'singleCreate'])->name('financial.singleCreate');
Route::resource('financials', FinancialController::class);

//these are Thing routes
Route::resource('things', ThingController::class);

// route::get('test',function(){
// return Customer::find(16)->CustType->id;
// });

// route::delete('force-delete/{id}', function ($id) {
//     // $custType = CustType::withTrashed()->where('id', $id)->first();
//     $custType = CustType::withTrashed()->find($id);

//     return $custType;
// });
