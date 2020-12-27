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

Route::get('/campaigns', 'App\Http\Controllers\CampaignController@getCampaigns');
Route::post('/campaign/create', 'App\Http\Controllers\CampaignController@createCampaign');
Route::post('/campaign/{campaignId}/update', 'App\Http\Controllers\CampaignController@updateCampaign');
Route::delete(
    '/campaign/{campaignId}/creative/{creativeId}/delete',
    'App\Http\Controllers\CampaignController@deleteCampaignCreative'
);
