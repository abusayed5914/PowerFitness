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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', 'UsersController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@deshboard')->name('deshboard');

Route::get('/addworkout', 'DashboardController@addWorkout')->name('addworkout');
Route::post('/storeworkout', 'DashboardController@storeWorkout')->name('storeworkout');
Route::post('/addDay', 'DashboardController@addDay')->name('addDay');

Route::get('/addvideo', 'DashboardController@addVideo')->name('addvideo');
Route::post('/storevideo', 'DashboardController@storeVideo')->name('storevideo');

Route::get('/workout/{id}', 'UsersController@viewWorkout')->name('workout');

Route::get('/video/{id}', 'UsersController@viewVideo')->name('video');

Route::get('/contactpage', 'UsersController@viewContactPage')->name('contactpage');

Route::post('/sendMessage', 'UsersController@sendMessage')->name('sendMessage');


Route::get('/addnutration', 'DashboardController@addNutration')->name('addnutration');
Route::post('/storenutration', 'DashboardController@storeNutration')->name('storenutration');


Route::get('/addprogram', 'DashboardController@addProgram')->name('addprogram');
Route::post('/storeprogram', 'DashboardController@storeProgram')->name('storeprogram');

Route::get('/program/{id}', 'UsersController@viewProgram')->name('program');

Route::get('/addnutrationcategory', 'DashboardController@addNutrationCategory')->name('addnutrationcategory');

Route::post('/storenutrationcategory', 'DashboardController@storeNutrationCategory')->name('storenutrationcategory');

Route::get('/nutration/{id}', 'UsersController@viewNutration')->name('nutration');

Route::get('messages', 'DashboardController@messages')->name('messages');

Route::POST('deletemessage', 'DashboardController@deleteMessage')->name('deletemessage');

Route::get('allworkout', 'DashboardController@allWorkout')->name('allworkout');

Route::get('editworkout/{id}', 'DashboardController@editworkout')->name('editworkout');

Route::POST('updateworkout', 'DashboardController@updateworkout')->name('updateworkout');

Route::POST('deleteWorkout','DashboardController@deleteWorkout')->name('deleteWorkout');
/*
Route::POST('updateworkout', 'DashboardController@updateworkout')->name('updateworkout');
*/
Route::get('sevenDays/{id}','UsersController@sevenDays')->name('sevenDays');

Route::POST('storeStartNutration','UsersController@storeStartNutration')->name('storeStartNutration');




Route::get('/addVideocategory', 'DashboardController@addVideoCategory')->name('addvideocategory');

Route::post('/storeVideocategory', 'DashboardController@storeVideoCategory')->name('storevideocategory');

Route::get('/addprogramcategory', 'DashboardController@addProgramCategory')->name('addprogramcategory');

Route::post('/storeprogramcategory', 'DashboardController@storeProgramCategory')->name('storeprogramcategory');

Route::get('/addworkoutcategory', 'DashboardController@addWorkoutCategory')->name('addworkoutcategory');

Route::post('/storeworkoutcategory', 'DashboardController@storeWorkoutCategory')->name('storeworkoutcategory');


// Program crud
Route::get('allprogram', 'DashboardController@allProgram')->name('allprogram');

Route::get('editprogram/{id}', 'DashboardController@editProgram')->name('editprogram');

Route::POST('updateprogram', 'DashboardController@updateProgram')->name('updateprogram');

Route::POST('deleteprogram','DashboardController@deleteProgram')->name('deleteprogram');

// video crud
Route::get('allvideo', 'DashboardController@allVideo')->name('allvideo');

Route::get('editvideo/{id}', 'DashboardController@editVideo')->name('editvideo');

Route::POST('updatevideo', 'DashboardController@updateVideo')->name('updatevideo');

Route::POST('deletevideo','DashboardController@deleteVideo')->name('deletevideo');

// Nutration crud
Route::get('allnutration', 'DashboardController@allNutration')->name('allnutration');

Route::get('editnutration/{id}', 'DashboardController@editNutration')->name('editnutration');

Route::POST('updatenutration', 'DashboardController@updateNutration')->name('updatenutration');

Route::POST('deletenutration','DashboardController@deleteNutration')->name('deletenutration');

// Workout category crud
Route::get('allworkoutcategory', 'DashboardController@allWorkoutCategory')->name('allworkoutcategory');

Route::get('editworkoutcategory/{id}', 'DashboardController@editWorkoutCategory')->name('editworkoutcategory');

Route::POST('updateworkoutcategory', 'DashboardController@updateWorkoutCategory')->name('updateworkoutcategory');

Route::POST('deleteworkoutcategory','DashboardController@deleteWorkoutCategory')->name('deleteworkoutcategory');


// Program category crud
Route::get('allprogramcategory', 'DashboardController@allProgramCategory')->name('allprogramcategory');

Route::get('editprogramcategory/{id}', 'DashboardController@editProgramCategory')->name('editprogramcategory');

Route::POST('updateprogramcategory', 'DashboardController@updateProgramCategory')->name('updateprogramcategory');

Route::POST('deleteprogramcategory','DashboardController@deleteProgramCategory')->name('deleteprogramcategory');

// Video category crud
Route::get('allvideocategory', 'DashboardController@allVideoCategory')->name('allvideocategory');

Route::get('editvideocategory/{id}', 'DashboardController@editVideoCategory')->name('editvideocategory');

Route::POST('updatevideocategory', 'DashboardController@updateVideoCategory')->name('updatevideocategory');

Route::POST('deletevideocategory','DashboardController@deleteVideoCategory')->name('deletevideocategory');

// Nutration category crud
Route::get('allnutrationcategory', 'DashboardController@allNutrationCategory')->name('allnutrationcategory');

Route::get('editnutrationcategory/{id}', 'DashboardController@editNutrationCategory')->name('editnutrationcategory');
Route::POST('updatenutrationcategory', 'DashboardController@updateNutrationCategory')->name('updatenutrationcategory');
Route::POST('deletenutrationcategory','DashboardController@deleteNutrationCategory')->name('deletenutrationcategory');


Route::get('/profile', 'UsersController@profile')->name('profile');

Route::get('/mynutrationplan', 'UsersController@myNutrationPlan')->name('mynutrationplan');

Route::get('/cancelNutration/{id}', 'UsersController@cancelNutration')->name('cancelNutration');

Route::get('/users','DashboardController@users')->name('users');

Route::POST('/deleteuser','DashboardController@deleteuser')->name('deleteuser');

