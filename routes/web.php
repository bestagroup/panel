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


Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('/toggle-theme', function () {
    $theme = session('theme') === 'theme-default-dark' ? 'theme-default' : 'theme-default-dark';
    session(['theme' => $theme]);
    return back();
})->name('toggle-theme');




Route::view('/admin/brand-management', 'admin.brand_management')->name('admin.brand_management');
Route::view('/admin/profile-view', 'admin.profile_view')->name('admin.profile_view');
Route::view('/admin/site-users', 'admin.site_users')->name('admin.site_users');
Route::view('/admin/notifications-management', 'admin.notifications_management')->name('admin.notifications_management');
Route::view('/admin/payments-management', 'admin.payments_management')->name('admin.payments_management');
Route::view('/admin/site-menu-management', 'admin.site_menu_management')->name('admin.site_menu_management');
Route::view('/admin/submenu-management', 'admin.submenu_management')->name('admin.submenu_management');
Route::view('/admin/slides-management', 'admin.slides_management')->name('admin.slides_management');
Route::view('/admin/customers-management', 'admin.customers_management')->name('admin.customers_management');
Route::view('/admin/news-events-management', 'admin.news_events_management')->name('admin.news_events_management');
Route::view('/admin/faq-management', 'admin.faq_management')->name('admin.faq_management');
Route::view('/admin/employees-management', 'admin.employees_management')->name('admin.employees_management');
Route::view('/admin/consulting-requests', 'admin.consulting_requests')->name('admin.consulting_requests');
Route::view('/admin/inquiries-management', 'admin.inquiries_management')->name('admin.inquiries_management');
Route::view('/admin/inquiry-fields', 'admin.inquiry_fields')->name('admin.inquiry_fields');
Route::view('/admin/posts-management', 'admin.posts_management')->name('admin.posts_management');
Route::view('/admin/educational-files', 'admin.educational_files')->name('admin.educational_files');
Route::view('/admin/courses-management', 'admin.courses_management')->name('admin.courses_management');
Route::view('/admin/media-management', 'admin.media_management')->name('admin.media_management');
Route::view('/admin/discounts-management', 'admin.discounts_management')->name('admin.discounts_management');


