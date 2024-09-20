<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('register',function(){
	return redirect('/login');
});

Route::get('password/reset',function(){
	return redirect('/login');
})->name('password.request');

Route::middleware(['auth'])->group(function () {
	Route::get('/change-password','Admin\PasswordController@managePassword')->name('password.manage');	
	Route::post('/update-password','Admin\PasswordController@updatePassword')->name('password.update');
	Route::get('/manage-user-password/{id}','Admin\PasswordController@manageUserPassword');
	Route::get('/dashboard','Admin\DashboardController@dashboard')->name('admin.dashboard');
	Route::resource('/documents','Admin\DocumentController');
	Route::get('/consolidate-export','Admin\HudController@consolidateReport');
	Route::get('/reports', 'Admin\ReportController@reportView');
});

Route::middleware(['admin'])->group(function () {
	Route::post('send-invitation','Admin\UserController@sendInvitation');
	Route::resource('/users','Admin\UserController');
	Route::get('/users-export','Admin\UserController@export')->name('users.export');
	Route::resource('/districts','Admin\DistrictController');
	Route::resource('/designations','Admin\DesignationController');
	Route::resource('/facilitytypes','Admin\FacilityTypeController');
	Route::get('/huds-export','Admin\HudController@export')->name('huds.export');
	Route::resource('/divisions', 'Admin\DivisionController');
	
	Route::resource('/bulk-mailers','Admin\BulkMailerController');
	Route::resource('/testimonials','Admin\TestimonialController');
	Route::resource('/social-media','Admin\SocialMediaController');
	Route::get('/header', 'Admin\HeaderController@edit');
	Route::post('/header/update/{id}', 'Admin\HeaderController@updateHeader')->name('header.update');
	Route::get('/footer', 'Admin\FooterController@edit');
	Route::post('/footer/update/{id}', 'Admin\FooterController@updateFooter')->name('footer.update');
	// Route::get('/configurations', 'Admin\ConfigurationController@edit');
	// Route::post('/configurations/update/{id}', 'Admin\ConfigurationController@updateConfiguration')->name('configurations.update');
	Route::get('/documents-export','Admin\DocumentController@export1')->name('documents.export');
});

Route::middleware(['privilege'])->group(function () {
	Route::resource('/contacts','Admin\ContactController');
	Route::get('/profile/update','Admin\ContactController@updateSelfContact');
	Route::resource('/huds','Admin\HudController');
	Route::get('/huds/destroy-document/{block}', 'Admin\HudController@destroyDocument');

	Route::resource('/blocks','Admin\BlockController');
	Route::get('/blocks/destroy-document/{block}', 'Admin\BlockController@destroyDocument');


	Route::resource('/phc','Admin\PhcController');
	Route::get('/phc/destroy-document/{block}', 'Admin\PhcController@destroyDocument');

	Route::resource('/hsc','Admin\HscController');
	Route::get('/hsc/destroy-document/{block}', 'Admin\HscController@destroyDocument');

	Route::get('/hw-location','Admin\HealthWalkLocationController@index');
	Route::post('/hw-location-submit','Admin\HealthWalkLocationController@store');
});


