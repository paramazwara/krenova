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


/*
Route::get('/', function(){
	return redirect('index');
});
*/

// Route::get('/', 'LoginController@index');
// Route::get('login/{provider}', 'LoginController@redirectToProvider');
// Route::get('{provider}/callback', 'LoginController@handleProviderCallback');


// Route::get('/', 'IndexController@index');

Route::get('sso', 'LoginController@login')->name('sso');
Route::get('login', 'Auth\GoogleController@redirectToGoogle')->name('login');
Route::get('callback', 'Auth\GoogleController@handleGoogleCallback');

Route::get('index', 'HomeController@home')->name('index');
Route::get('logout', 'HomeController@logout')->name('logout');

Route::get('innovations', 'IndexController@innovations')->name('innovations');
Route::get('awards', 'IndexController@awards')->name('awards');
Route::get('testimonials', 'IndexController@testimonials')->name('testimonials');
Route::get('teams', 'IndexController@teams')->name('teams');

Route::get('dashboard', 'HomeController@index')->name('dashboard');


Route::get('kuesioner', 'KuesionerController@index')->name('kuesioner');

Route::get('kelurahan/{id}', 'KelurahanController@getKelByKec');


Route::any('/', 'HomeController@index')->name('any');

// Auth::routes();

// Route::middleware('auth')->group(function(){

    Route::get('inventor', 'InventorController@index')->name('inventor');
    Route::get('inventorAdd', 'InventorController@inventorAdd')->name('inventorAdd')->middleware('auth');
    Route::get('inventorEdit/{id}', 'InventorController@inventorEdit')->name('inventorEdit');
    Route::post('inventor/save', 'InventorController@store')->name('inventor.save')->middleware('auth');

    Route::post('inventor/approval/{id}', 'InventorController@approval')->name('inventor.approval')->middleware('auth');

    // Route::post('inventor/validate', 'InventorController@validate')->name('inventor.validate')->middleware('auth');
    // Route::post('inventor/revise', 'InventorController@revise')->name('inventor.revise')->middleware('auth');

    Route::get('inventor/reject', 'InventorController@reject')->name('inventor.reject')->middleware('auth');
    // Route::post('inventor/reject', 'InventorController@reject')->name('inventor.reject');

    Route::get('getInventors', 'InventorController@getInventors')->name('getInventors');
    Route::get('getInventorById', 'InventorController@getInventorById')->name('getInventorById');

    Route::get('inovasi', 'InovasiController@index')->name('inovasi');
    Route::get('inovasi/del/{id}', 'InovasiController@delete');

    Route::get('getInovasiByInventor', 'InovasiController@getInovasiByInventor')->name('getInovasiByInventor');

// });


/*
Route::get('login', 'Auth\GoogleController@redirectToGoogle')->name('login');

Route::get('login/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('callback', 'Auth\GoogleController@handleGoogleCallback');

Route::get('config/TahunAdd', 'TahunController@showRegisterForm');
Route::post('config/TahunAdd', 'TahunController@store');

*/
