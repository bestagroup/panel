<?php

use Illuminate\Support\Facades\Route;

Route::get('dashboard'                , 'App\Http\Controllers\Panel\IndexController@index')         ->name('dashboard');

Route::prefix('panel')->namespace('App\Http\Controllers\Panel')->group(function () {
    Route::resource('menupanelmanagement'    , 'MenupanelController');
    Route::resource('submenupanelmanagement' , 'SubmenupanelController');
    Route::get('owner'                    , 'OwnerController@index')         ->name('owner');
});

//Route::middleware(['panel.access:panel'])->prefix('panel')->group(function () {
//    Route::get('profile'            , 'ProfileController@profile')              ->name('profile');
//});
//
//Route::middleware(['submenu.permission:can_insert,users'])->namespace('App\Http\Controllers\Panel')->prefix('panel')->group(function () {
//    Route::post('edit-user-profile' , 'ProfileController@edituserprofile')      ->name('edit-user-profile');
//});
//
//Route::middleware(['submenu.permission:can_update,users'])->namespace('App\Http\Controllers\Panel')->prefix('panel')->group(function () {
//    Route::PATCH('profile/update'           , 'ProfileController@update')       ->name('edituser');
//});
//
//Route::middleware(['submenu.permission:can_delete,users'])->namespace('App\Http\Controllers\Panel')->prefix('panel')->group(function () {
//    Route::delete('deleteuser'              , 'UserController@deleteuser')                          ->name('deleteuser');
//});





Route::get('/toggle-theme', function () {
    $theme = session('theme') === 'theme-default-dark' ? 'theme-default' : 'theme-default-dark';
    session(['theme' => $theme]);
    return back();
})->name('toggle-theme');



//Route::get('/dashboard', function () {return view('dashboard');});
Route::view('/panel/brand-management'           , 'panel.brand_management')         ->name('panel.brand_management');
Route::view('/panel/profile-view'               , 'panel.profile_view')             ->name('panel.profile_view');
Route::view('/panel/site-users'                 , 'panel.site_users')               ->name('panel.site_users');
Route::view('/panel/notifications-management'   , 'panel.notifications_management') ->name('panel.notifications_management');
Route::view('/panel/payments-management'        , 'panel.payments_management')      ->name('panel.payments_management');
Route::view('/panel/site-menu-management'       , 'panel.site_menu_management')     ->name('panel.site_menu_management');
Route::view('/panel/submenu-management'         , 'panel.submenu_management')       ->name('panel.submenu_management');
Route::view('/panel/slides-management'          , 'panel.slides_management')        ->name('panel.slides_management');
Route::view('/panel/customers-management'       , 'panel.customers_management')     ->name('panel.customers_management');
Route::view('/panel/news-events-management'     , 'panel.news_events_management')   ->name('panel.news_events_management');
Route::view('/panel/faq-management'             , 'panel.faq_management')           ->name('panel.faq_management');
Route::view('/panel/employees-management'       , 'panel.employees_management')     ->name('panel.employees_management');
Route::view('/panel/consulting-requests'        , 'panel.consulting_requests')      ->name('panel.consulting_requests');
Route::view('/panel/inquiries-management'       , 'panel.inquiries_management')     ->name('panel.inquiries_management');
Route::view('/panel/inquiry-fields'             , 'panel.inquiry_fields')           ->name('panel.inquiry_fields');
Route::view('/panel/posts-management'           , 'panel.posts_management')         ->name('panel.posts_management');
Route::view('/panel/educational-files'          , 'panel.educational_files')        ->name('panel.educational_files');
Route::view('/panel/courses-management'         , 'panel.courses_management')       ->name('panel.courses_management');
Route::view('/panel/media-management'           , 'panel.media_management')         ->name('panel.media_management');
Route::view('/panel/discounts-management'       , 'panel.discounts_management')     ->name('panel.discounts_management');


