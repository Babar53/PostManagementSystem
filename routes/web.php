<?php

use App\Http\Controllers\RolesAndPermissionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.master');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('/post-create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');

//group route for roles and permissions
Route::controller(RolesAndPermissionsController::class)->group(function () {
    Route::get('/roles-list', 'index')->name('roles.index');
    Route::get('/roles-create', 'create')->name('roles.create');

});


Route::get('user/role/edit/{id}', [RolesAndPermissionsController::class, 'roleUserEdit'])->name('role.user.edit');
Route::post('roles/user/store/', [RolesAndPermissionsController::class, 'roleUserStore'])->name('role.store');
Route::post('roles/user/update/{id}', [RolesAndPermissionsController::class, 'roleUserUpdate'])->name('role.update');
