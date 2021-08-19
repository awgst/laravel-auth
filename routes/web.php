<?php
use App\Http\Controllers\CustomAuthController;
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

Route::get('/', 'CustomAuthController@index');
Route::get('/dashboard', 'CustomAuthController@dashboard');
Route::get('/registration', 'CustomAuthController@registration');
Route::get('/logout', 'CustomAuthController@logout');
Route::post('/custom-login', 'CustomAuthController@customLogin');
Route::post('/custom-registration', 'CustomAuthController@customRegistration');
