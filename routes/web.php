<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['panel.access:admin'])->prefix('panel')->group(function () {
    Route::get('profile'            , 'ProfileController@profile')              ->name('profile');
});

Route::middleware(['submenu.permission:can_insert,users'])->namespace('App\Http\Controllers\Panel')->prefix('panel')->group(function () {
    Route::post('edit-user-profile' , 'ProfileController@edituserprofile')      ->name('edit-user-profile');
});

Route::middleware(['submenu.permission:can_update,users'])->namespace('App\Http\Controllers\Panel')->prefix('panel')->group(function () {
    Route::PATCH('profile/update'           , 'ProfileController@update')       ->name('edituser');
});

Route::middleware(['submenu.permission:can_delete,users'])->namespace('App\Http\Controllers\Panel')->prefix('panel')->group(function () {
    Route::delete('deleteuser'              , 'UserController@deleteuser')                          ->name('deleteuser');
});
