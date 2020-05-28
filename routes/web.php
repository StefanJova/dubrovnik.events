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
Route::get('/',
function () {
    return redirect(app()->getLocale());
});

Route::get('/privacy-policy','HomeController@privacy')->name('privacy');


Route::group([
    'prefix'=>'{locale}',
    'where'=>['locale'=>'[a-zA-Z]{2}'],
    'middleware'=>'setlocale',
],function(){

    Route::get('/', 'HomeController@index')->name('home');
    Auth::routes([
        'register' => false, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]);

    Route::get('/about','HomeController@about')->name('about');
    Route::get('/contact','HomeController@contact')->name('contact');
    Route::post('/contact/send','HomeController@contactSend')->name('contact.send');

    Route::resource('/host','OwnerController', ['except' => ['show']]);
    Route::get('/host/{slug}','OwnerController@show')->name('host.show');
    Route::get('/host/create/details/{id}','OwnerController@createDetails')->name('createOwnerDetails')->middleware('auth');
    Route::post('/host/store/details','OwnerController@storeDetails')->name('host.storeDetails')->middleware('auth');
    Route::get('/host/create/social/{id}','OwnerController@createSocial')->name('createOwnerSocial')->middleware('auth');
    Route::post('/host/store/social','OwnerController@storeSocial')->name('host.storeSocial')->middleware('auth');
    Route::get('/host/create/photos/{id}','OwnerController@createPhotos')->name('createOwnerPhotos')->middleware('auth');
    Route::post('/host/store/photos','OwnerController@storePhotos')->name('host.storePhotos')->middleware('auth');
    Route::get('/host/create/amenities/{id}','OwnerController@createAmenities')->name('createOwnerAmenities')->middleware('auth');
    Route::post('/host/store/amenities','OwnerController@storeAmenities')->name('host.storeAmenities')->middleware('auth');
    Route::patch('/host/details/{host}','OwnerController@updateDetails')->name('host.updateDetails')->middleware('auth');
    Route::patch('/host/social/{host}','OwnerController@updateSocial')->name('host.updateSocial')->middleware('auth');
    Route::patch('/host/amenities/{host}','OwnerController@updateAmenities')->name('host.updateAmenities')->middleware('auth');
    Route::delete('/host/delete/photo/{photo}','OwnerController@destroyPhoto')->name('host.destroyPhoto')->middleware('auth');
    Route::get('/host/create/success', 'OwnerController@success')->name('host.success')->middleware('auth');
    Route::get('/featured/places', 'OwnerController@featuredIndex')->name('featured.places');

    Route::resource('/event','EventController');
    Route::get('/event/create/social/{id}','EventController@createSocial')->name('createEventSocial')->middleware('auth');
    Route::post('/event/store/social','EventController@storeSocial')->name('event.storeSocial')->middleware('auth');
    Route::get('/event/create/photos/{id}','EventController@createPhotos')->name('createEventPhotos')->middleware('auth');
    Route::post('/event/store/photos','EventController@storePhotos')->name('event.storePhotos')->middleware('auth');
    Route::get('/event/create/success', 'EventController@success')->name('event.success')->middleware('auth');
    Route::patch('/event/social/{event}','EventController@updateSocial')->name('event.updateSocial')->middleware('auth');
    Route::delete('/event/delete/photo/{photo}','EventController@destroyPhoto')->name('event.destroyPhoto')->middleware('auth');

    Route::resource('/reservation','ReservationController');
    Route::get('/reservation/new/show','AdminController@resNew')->name('admin.resNew')->middleware('auth');
    Route::get('/reservation/done/{reservation}','ReservationController@done')->name('reservation.done')->middleware('auth');
    Route::get('/reservation/undone/{reservation}','ReservationController@undone')->name('reservation.undone')->middleware('auth');
    Route::get('/reservation/delete/{reservation}','ReservationController@del')->name('reservation.del')->middleware('auth');

    Route::get('/admin/events/','AdminController@events')->name('admin.events')->middleware('auth');
    Route::get('/admin/hosts/','AdminController@hosts')->name('admin.hosts')->middleware('auth');
    Route::get('/admin/landmarks/','AdminController@landmarks')->name('admin.landmarks')->middleware('auth');

    Route::resource('/landmark','PTSController');
    Route::get('/landmark/create/photos/{id}','PTSController@createPhotos')->name('createPTSPhotos')->middleware('auth');
    Route::post('/landmark/store/photos','PTSController@storePhotos')->name('landmark.storePhotos')->middleware('auth');
    Route::delete('/landmark/delete/photo/{photo}','PTSController@destroyPhoto')->name('landmark.destroyPhoto')->middleware('auth');
    Route::get('/landmark/create/success', 'PTSController@success')->name('landmark.success')->middleware('auth');

}); //closed locale group
