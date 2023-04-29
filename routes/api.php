<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CityStudentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UniversityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('students', [StudentController::class, 'index']);
// Route::get('students/{id}', [StudentController::class, 'show']);

// Route::resource('students', StudentController::class)->only(['index', 'show', 'destroy']);

// Route::get('/cities', [CityController::class, 'index']);
// Route::get('/cities/{id}', [CityController::class, 'show']);

// Route::post('/cities', [CityController::class, 'store']);

// Route::resource('cities', CityController::class)->except('create', 'edit');

// Route::resource('universities', UniversityController::class)->except('create', 'edit');

// Route::get('cities/{id}/students', [CityStudentController::class, 'index'])->name('cities.students.index');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });
    Route::resource('universities', UniversityController::class)->only(['update', 'store', 'destroy']);
    Route::resource('cities', CityController::class)->only(['store', 'destroy']);
    Route::resource('students', StudentController::class)->only(['destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::resource('universities', UniversityController::class)->only(['index', 'show']);
Route::resource('cities', CityController::class)->only(['index', 'show']);
Route::resource('students', StudentController::class)->only(['index', 'show']);
Route::resource('cities.students', CityStudentController::class)->only(['index']);