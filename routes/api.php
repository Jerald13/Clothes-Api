<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\COntrollers\DeviceController;
use App\Http\COntrollers\FreeGiftController;
use App\Http\COntrollers\VoucherController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\LogisticController;
use App\Http\COntrollers\DeliverController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get("data", [dummyAPI::class, "getData"]);
// Route::get("list",[DeviceController::class,'list']);

// Route::get('/free-gifts', 'FreeGiftController@index');

// Route::get("free-gifts",[FreeGiftController::class,'index']);


Route::get('/vouchers', [VoucherController::class, 'index']);


Route::post('vouchers/check', [VoucherController::class, 'checkVoucher'])->name('vouchers.check');

Route::get('/banks/names', [BankController::class, 'getAllBanks'])->name('banks.names');

Route::get('/logistics/names', [LogisticController::class, 'getAll'])->name('logistic.names');

Route::post('/retrieveAccountInfo', [BankController::class, 'retrieveAccountInfo']);
Route::post('/validateAccountInfo', [BankController::class, 'validateAccountInfo']);
Route::post('/deductBankAmount', [BankController::class, 'deductBankAmount']);

Route::get('/deliver', [DeliverController::class, 'index']);



Route::get('/freegift', [FreeGiftController::class, 'index']);