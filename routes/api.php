<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware(['cors','websiteApi'])->post('get-nav-files', 'Website\HomePageController@getNavFile');
Route::middleware(['cors','websiteApi'])->post('utilities', 'Website\HomePageController@utilities');

Route::middleware(['cors','websiteApi'])->group(function () {

    Route::post('districts','Website\HomePageController@getDistricts');
    Route::post('huds','Website\HomePageController@getHuds');
    Route::post('blocks','Website\HomePageController@getBlocks');
    Route::post('phc','Website\HomePageController@getPHC');
    Route::post('hsc','Website\HomePageController@getHSC');
    Route::post('contacts','Website\HomePageController@getContacts');
    Route::post('divisions','Website\DivisionController@getDivisions');    
});

Route::post('contact-designations','Admin\DesignationController@listDesignations');
Route::post('list-hud','Admin\HudController@listHUD');
Route::post('list-block','Admin\BlockController@listBlock');
Route::post('list-phc','Admin\PhcController@listPHC');
Route::post('list-hsc','Admin\HscController@listHSC');
Route::post('list-block-contacts','Admin\ContactController@listBlockContact');
Route::post('testimonial','Admin\TestimonialController@listTestimonial');
Route::post('configuration','Admin\ConfigurationController@getConfiguration');
Route::post('health-walk-locations','Admin\HealthWalkLocationController@getHealthWalkLocations');


