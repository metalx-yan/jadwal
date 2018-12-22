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

Route::group(['prefix' => 'curriculum', 'middleware' => ['auth','role:curriculum']], function() {

	Route::get('expertise/{level_id}/{major_id}', 'ExpertiseController@mix')->name('mix.expertise');

	Route::get('expertise/{level_id}/{major_id}/{expertise_id}/edit', 'ExpertiseController@editmix')->name('editmix.expertise');

	Route::get('teacher/{typeteacher_id}', 'TeacherController@mix')->name('mix.teacher');

	Route::get('/', function() {
	    return view('curriculums.content');
	})->name('curriculum');

	Route::resource('teacher', 'TeacherController')->except(['create', 'show']);

	Route::resource('room', 'RoomController')->except(['create', 'show']);

	Route::resource('lesson', 'LessonController')->except(['create', 'show']);

	Route::resource('expertise', 'ExpertiseController')->except(['create', 'show']);
});

Route::group(['prefix' => 'major', 'middleware' => ['auth','role:major']], function() {

	Route::get('rooms', 'RoomController@view')->name('room.view');

	Route::get('/', function() {
	    return view('majors.content');
	})->name('major');
});





Route::get('/404', function() { 
	return view('errors.404');
})->name('404');

Route::get('/', function() {
	return view('welcome');
});

Auth::routes();


// Route::get('/curriculum/teacher', function() {
// 	return view('curriculums.teachers.index');
// })->name('curriculums.teachers.index');

// Route::group(['prefix' => 'major', 'middleware' => 'auth','role:major'], function() {

// 	Route::get('/', 'MajorController@index')->name('major');
// });
