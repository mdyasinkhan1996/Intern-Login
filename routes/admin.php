<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PostController;


Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home')->middleware('is_admin');
Route::post('/post/create', [AdminController::class, 'create'])->name('post.create')->middleware('is_admin');
Route::get('/post/edit/{slug}', [AdminController::class, 'edit'])->name('post.edit')->middleware('is_admin');
Route::post('/post/update/{slug}', [AdminController::class, 'update'])->name('post.update')->middleware('is_admin');
Route::get('/post/destroy/{slug}', [AdminController::class, 'destroy'])->name('post.destroy')->middleware('is_admin');
