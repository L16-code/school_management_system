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


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    //teacher route
    // Route::get('teacher', [App\Http\Controllers\Admin\TeacherController::class, 'index']);
    // Route::post('addteacher', [App\Http\Controllers\Admin\TeacherController::class, 'addteacher']);
    // Route::get('teachers', [App\Http\Controllers\Admin\TeacherController::class, 'teachershow']);

    //edit
    Route::controller(App\Http\Controllers\Admin\TeacherController::class)->group(function () {
        Route::get('/teacher', 'index');
        Route::post('/addteacher',  'addteacher');
        Route::get('/teachers',  'teachershow');
        Route::get('/teacher/{tid}/edit','edit');
        Route::get('/teacher/{tid}/delete','delete');
        Route::put('/addteacher/{tid}','update');
        // Route::get('/orders/{id}', 'show');
        // Route::post('/orders', 'store');
    });

});
