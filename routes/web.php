<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudyProgramController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\ActivitiesController;


use Illuminate\Support\Facades\Auth;
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

Auth::routes([
    'verify' => false,
    'register' => false,
    'reset' => false,
]);

Route::get('/', function () {
    return redirect('/dashboard');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth']);

// Permission
Route::get('/permissions', [PermissionController::class, 'index'])->middleware('auth');
Route::post('/permissions', [PermissionController::class, 'store'])->middleware('auth');
Route::get('/permissions/{id}', [PermissionController::class, 'edit'])->middleware('auth');
Route::patch('/permissions/{permission}', [PermissionController::class, 'update'])->middleware('auth');
Route::delete('/permissions/{permission}', [PermissionController::class, 'destroy'])->middleware('auth');

// Study Program
Route::get('/studyprograms', [StudyProgramController::class, 'index'])->middleware('auth');
Route::post('/studyprograms', [StudyProgramController::class, 'store'])->middleware('auth');
Route::get('/studyprograms/{id}', [StudyProgramController::class, 'edit'])->middleware('auth');
Route::patch('/studyprograms/{studyprogram}', [StudyProgramController::class, 'update'])->middleware('auth');
Route::delete('/studyprograms/{studyprogram}', [StudyProgramController::class, 'destroy'])->middleware('auth');

Route::resource('/roles', RoleController::class)->middleware('auth');
Route::resource('/users', UserController::class)->middleware('auth');
Route::resource('/lecturers', LecturerController::class)->middleware('auth');
Route::resource('/students', StudentController::class)->middleware('auth');

Route::resource('/activities', ActivitiesController::class)->middleware('auth');
Route::get('/maps', [ActivitiesController::class, 'maps'])->middleware('auth');

Route::get('/my-account', [MyAccountController::class, 'show'])->middleware('auth');
Route::post('/my-account', [MyAccountController::class, 'updateAccount'])->middleware('auth');
Route::post('/my-account/update-password', [MyAccountController::class, 'updatePassword'])->middleware('auth');
