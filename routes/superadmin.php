<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SuperAdminController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/superadmin/home', [SuperAdminController::class, 'index'])->name('superAdmin.home')->middleware('super_admin');
Route::get('/post/publish/{slug}', [SuperAdminController::class, 'publish'])->name('post.publish')->middleware('super_admin');
Route::get('/post/inapprove/{slug}', [SuperAdminController::class, 'inapprove'])->name('post.inapprove')->middleware('super_admin');
