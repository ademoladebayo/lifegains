<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Cors;

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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});





// =============================================================================
//               BEGINNING OF USER ROUTE
// =============================================================================
Route::post('user/signin', 'UserController@signIn', function () {
})->middleware(Cors::class);

Route::get('user/all-class', 'UserController@getAllClass', function () {
})->middleware(Cors::class);
// =============================================================================
//               END OF USER ROUTE
// =============================================================================



// =============================================================================
//               BEGINNING OF TRANSACTION ROUTE
// =============================================================================

Route::post('transaction/save-transaction', 'TransactionController@saveTransaction', function () {
})->middleware(Cors::class);

// =============================================================================
//               END OF TRANSACTION ROUTE
// =============================================================================
