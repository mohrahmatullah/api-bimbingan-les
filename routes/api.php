<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\JadwalBelajarController;
use App\Http\Controllers\TransactionController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [AuthController::class, 'register']);
//API route for login user
Route::post('/login', [AuthController::class, 'login']);

Route::post('/check-email', [AuthController::class, 'checkEmail']);
Route::post('/send-link-forgot-password', [AuthController::class, 'sendLinkForgotPassword']);
Route::post('/save-forgot-password', [AuthController::class, 'saveForgotPassword']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('biodata', [BiodataController::class, 'index']);
    Route::post('biodata', [BiodataController::class, 'saveUpdate']);

    Route::get('kelas', [KelasController::class, 'index']);
    Route::post('kelas', [KelasController::class, 'saveUpdate']);

    Route::get('jurusan', [JurusanController::class, 'index']);
    Route::post('jurusan', [JurusanController::class, 'saveUpdate']);

    Route::get('jadwal-belajar', [JadwalBelajarController::class, 'index']);
    Route::post('jadwal-belajar', [JadwalBelajarController::class, 'saveUpdate']);

    Route::get('transactions', [TransactionController::class, 'index']);
    Route::post('transactions', [TransactionController::class, 'saveUpdate']);
    Route::post('approve-transactions', [TransactionController::class, 'approveTransaction']);
    Route::post('cancel-transactions', [TransactionController::class, 'cancelTransaction']);
    Route::post('auto-cancel-transactions', [TransactionController::class, 'autoCancelTransaction']);
    
    Route::post('delete', [AjaxController::class, 'deleteItemId']);    
    Route::post('show', [AjaxController::class, 'showItemId']);
    // API route for logout user
    Route::post('/logout', [AuthController::class, 'logout']);
});