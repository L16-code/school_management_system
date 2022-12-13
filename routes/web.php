<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->middleware(['auth', 'isAdmin:0,1,2']);

    //class routes
    Route::prefix('admin')->controller(App\Http\Controllers\Admin\ClassController::class)->group(function () {
    Route::get('class',  'class')->middleware(['auth', 'isAdmin:0,1,null']);
    Route::post('addclass',  'addclass')->middleware(['auth', 'isAdmin:0,1,null']);
    Route::get('display',  'display')->middleware(['auth', 'isAdmin:0,1,null']);
    Route::get('/class/{id}/edit','edit')->middleware(['auth', 'isAdmin:0,1,null']);
    Route::put('/updateclass/{id}','update')->middleware(['auth', 'isAdmin:0,1,null']);
    Route::get('/searchclass', 'search')->middleware(['auth', 'isAdmin:0,1,null']);
});


    //teacher routes
    Route::prefix('admin')->controller(App\Http\Controllers\Admin\TeacherController::class)->group(function () {
        Route::get('/teacher', 'index')->middleware(['auth', 'isAdmin:0,null,null']);
        Route::post('/addteacher',  'addteacher')->middleware(['auth', 'isAdmin:0,null,null']);
        Route::get('/teachers',  'teachershow')->middleware(['auth', 'isAdmin:0,1,null']);
        Route::get('/teacher/{tid}/edit','edit')->middleware(['auth', 'isAdmin:0,null,null']);
        Route::post('/delete','delete')->middleware(['auth', 'isAdmin:0,null,null']);
        Route::put('/addteacher/{tid}','update')->middleware(['auth', 'isAdmin:0,null,null']);
        Route::get('/search', 'search')->middleware(['auth', 'isAdmin:0,1,null']);
        Route::post('/status',  'status')->middleware(['auth', 'isAdmin:0,null,null']);
    });
// hello how its working now i hope its
//students controller
Route::prefix('admin')->controller(App\Http\Controllers\Admin\StudentController::class)->group(function () {


    Route::get('/student', 'index')->middleware(['auth', 'isAdmin:0,1,null']);
    Route::post('/addstudent',  'addstudent')->middleware(['auth', 'isAdmin:0,1,null']);
    Route::get('/displaystudent',  'display')->middleware(['auth', 'isAdmin:0,1,null']);
    Route::get('/searchstudent', 'search')->middleware(['auth', 'isAdmin:0,1,null']);
});
