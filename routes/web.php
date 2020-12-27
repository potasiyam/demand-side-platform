<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\ViewsController@getHomeView');
Route::get('/campaign/create', 'App\Http\Controllers\ViewsController@getCampaignCreateView')->name('campaign.create');
Route::get('/campaign/{campaignId}/edit', 'App\Http\Controllers\ViewsController@getCampaignEditView');
