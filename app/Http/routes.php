<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

    // Authentication routes...
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');

    // Registration routes...
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');

    // Facebook authentication routes...
    Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
    Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');

    // Campaign routes...
    Route::post('search', 'CampaignController@search');
    Route::get('view-campaign/{id}', 'CampaignController@view');

    // Routes that need users to be signed in...
    Route::group(['middleware' => ['auth']], function () {
        // Payment routes...
        Route::get('/payment-successful/{id}', 'PaymentController@success');
        Route::get('{id}/pay', 'PaymentController@pay');
        Route::post('{id}/pay', 'PaymentController@pay');

        // Campaign routes...
        Route::get('campaigns', 'CampaignController@index');
        Route::get('create', 'CampaignController@create');
        Route::post('create', 'CampaignController@create');
        Route::get('edit-campaign/{id}', 'CampaignController@edit');
        Route::get('delete-campaign', 'CampaignController@deleteCampaign');

        // Dashboard routes
        Route::get('dashboard', 'DashboardController@index');
        Route::get('dashboard/messages', 'DashboardController@messages');
        Route::get('dashboard/notifications', 'DashboardController@notifications');

        // User routes
        Route::get('profile', 'UserController@profile');

        // Messaging Routes
        Route::post('message/store/', ['as' => 'store/', 'uses' => 'MessagesController@store']);
        Route::get('message/show/{id}', ['as' => 'show/', 'uses' => 'MessagesController@show']);
        Route::put('message/update/{id}', ['as' => 'update/', 'uses' => 'MessagesController@update']);
    });

    Route::get('/', 'CampaignController@index');
    Route::get('/{category}/campaigns/', 'CampaignController@index');

    // Sandbox routes
    Route::get('module/campaign', 'SandboxController@campaignModule');
});