<?php

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


Auth::routes();

Route::get('/', 'HomeController@index');
Route::post('/', "HomeController@storeData");
Route::get('/profile/cv', "CV\CvController@getCv")->name('profile.cv.index');
Route::post('/profile/cv/{cv}', "HomeController@setCv")->name('profile.cv.index');
Route::get('/profile', "HomeController@profile")->name('profile.index');
Route::post('/profile/{id}', "HomeController@import")->name('profile.import');
//user data
Route::get('/profile/data/user', "Profile\UserController@getUser");
Route::post('/profile/data/user', "Profile\UserController@editUser");
//zainteresowania data
Route::resource('/profile/data/zainteresowania', 'Profile\ZainteresowaniaController', ['except' => ['show'], 'names' => [ 
    'index'   => 'profile.data.zainteresowania.index',
    'create'  => 'profile.data.zainteresowania.create',
    'store'   => 'profile.data.zainteresowania.store',
    'edit'    => 'profile.data.zainteresowania.edit',
    'update'  => 'profile.data.zainteresowania.update',
    'destroy' => 'profile.data.zainteresowania.destroy'
]], ['except' => ['show']]);
//umiejetnosci data
Route::resource('/profile/data/umiejetnosci', 'Profile\UmiejetnosciController', ['except' => ['show'], 'names' => [ 
    'index'   => 'profile.data.umiejetnosci.index',
    'create'  => 'profile.data.umiejetnosci.create',
    'store'   => 'profile.data.umiejetnosci.store',
    'edit'    => 'profile.data.umiejetnosci.edit',
    'update'  => 'profile.data.umiejetnosci.update',
    'destroy' => 'profile.data.umiejetnosci.destroy'
]], ['except' => ['show']]);
//jezyki obce data
Route::resource('/profile/data/jezyki_obce', 'Profile\JezykiObceController', ['except' => ['show'], 'names' => [ 
    'index'   => 'profile.data.jezyki_obce.index',
    'create'  => 'profile.data.jezyki_obce.create',
    'store'   => 'profile.data.jezyki_obce.store',
    'edit'    => 'profile.data.jezyki_obce.edit',
    'update'  => 'profile.data.jezyki_obce.update',
    'destroy' => 'profile.data.jezyki_obce.destroy'
]], ['except' => ['show']]);
//doswiadczenie data
Route::resource('/profile/data/doswiadczenie', 'Profile\DoswiadczenieController', ['except' => ['show'], 'names' => [ 
    'index'   => 'profile.data.doswiadczenie.index',
    'create'  => 'profile.data.doswiadczenie.create',
    'store'   => 'profile.data.doswiadczenie.store',
    'edit'    => 'profile.data.doswiadczenie.edit',
    'update'  => 'profile.data.doswiadczenie.update',
    'destroy' => 'profile.data.doswiadczenie.destroy'
]], ['except' => ['show']]);
//edukacja data
Route::resource('/profile/data/edukacja', 'Profile\EdukacjaController', ['except' => ['show'], 'names' => [ 
    'index'   => 'profile.data.edukacja.index',
    'create'  => 'profile.data.edukacja.create',
    'store'   => 'profile.data.edukacja.store',
    'edit'    => 'profile.data.edukacja.edit',
    'update'  => 'profile.data.edukacja.update',
    'destroy' => 'profile.data.edukacja.destroy'
]], ['except' => ['show']]);
// user data
Route::get('/profile/cv/{cv}/user', "Profile\CV\UserController@index")->name('profile.cv.details.dane_osobowe.index');
Route::post('/profile/cv/{cv}/user', "Profile\CV\UserController@editUser")->name('profile.cv.details.dane_osobowe.index');
//zainteresowania data
Route::resource('/profile/cv/{cv}/data/zainteresowania', 'Profile\CV\ZainteresowaniaController', ['except' => ['show'], 'names' => [ 
    'index'   => 'profile.cv.details.zainteresowania.index',
    'create'  => 'profile.cv.details.zainteresowania.create',
    'store'   => 'profile.cv.details.zainteresowania.store',
    'edit'    => 'profile.cv.details.zainteresowania.edit',
    'update'  => 'profile.cv.details.zainteresowania.update',
    'destroy' => 'profile.cv.details.zainteresowania.destroy'
]], ['except' => ['show']]);
//umiejetnosci data
Route::resource('/profile/cv/{cv}/data/umiejetnosci', 'Profile\CV\UmiejetnosciController', ['except' => ['show'], 'names' => [ 
    'index'   => 'profile.cv.details.umiejetnosci.index',
    'create'  => 'profile.cv.details.umiejetnosci.create',
    'store'   => 'profile.cv.details.umiejetnosci.store',
    'edit'    => 'profile.cv.details.umiejetnosci.edit',
    'update'  => 'profile.cv.details.umiejetnosci.update',
    'destroy' => 'profile.cv.details.umiejetnosci.destroy'
]], ['except' => ['show']]);
//jezyki obce data
Route::resource('/profile/cv/{cv}/data/jezyki_obce', 'Profile\CV\JezykiObceController', ['except' => ['show'], 'names' => [ 
    'index'   => 'profile.cv.details.jezyki_obce.index',
    'create'  => 'profile.cv.details.jezyki_obce.create',
    'store'   => 'profile.cv.details.jezyki_obce.store',
    'edit'    => 'profile.cv.details.jezyki_obce.edit',
    'update'  => 'profile.cv.details.jezyki_obce.update',
    'destroy' => 'profile.cv.details.jezyki_obce.destroy'
]], ['except' => ['show']]);
//doswiadczenie data
Route::resource('/profile/cv/{cv}/data/doswiadczenie', 'Profile\CV\DoswiadczenieController', ['except' => ['show'], 'names' => [ 
    'index'   => 'profile.cv.details.doswiadczenie.index',
    'create'  => 'profile.cv.details.doswiadczenie.create',
    'store'   => 'profile.cv.details.doswiadczenie.store',
    'edit'    => 'profile.cv.details.doswiadczenie.edit',
    'update'  => 'profile.cv.details.doswiadczenie.update',
    'destroy' => 'profile.cv.details.doswiadczenie.destroy'
]], ['except' => ['show']]);
//edukacja data
Route::resource('/profile/cv/{cv}/data/edukacja', 'Profile\CV\EdukacjaController', ['except' => ['show'], 'names' => [ 
    'index'   => 'profile.cv.details.edukacja.index',
    'create'  => 'profile.cv.details.edukacja.create',
    'store'   => 'profile.cv.details.edukacja.store',
    'edit'    => 'profile.cv.details.edukacja.edit',
    'update'  => 'profile.cv.details.edukacja.update',
    'destroy' => 'profile.cv.details.edukacja.destroy'
]], ['except' => ['show']]);
// Route::get('/pdf','HomeController@export_pdf')->name('user.pdf');
