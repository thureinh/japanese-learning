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
Broadcast::routes();
Route::get('/', 'PagesController@index')->name('index');

Auth::routes(['verify' => true]);

// Home Route
Route::get('/home', 'HomeController@index')->name('home');

// Contact Rout
Route::get('/contactus', 'PagesController@contactus')->name('contactus');

// Routes accessible only by Teacher
Route::middleware(['auth', 'sensei'])->group(function() {
	Route::get('/senseihome', 'PagesController@senseihome')->name('senseihome');

	// Control Routes of Teacher
	Route::name('teacher.')->prefix('teacher')->group(function () {
		Route::get('show', 'TeacherController@show')->name('show');
		Route::get('edit', 'TeacherController@edit')->name('edit');
		Route::put('update', 'TeacherController@update')->name('update');
		Route::get('setting', function() {
			return redirect()->route('teacher.edit');
		})->middleware(['password.confirm', 'verified'])->name('setting');
	});
	
	// resource controller
	Route::resource('vocab', 'VocabController');

	Route::resource('vocabdetail', 'VocabdetailController');

	Route::resource('kanji', 'KanjiController');

	Route::resource('kanjiword', 'KanjiwordController');
});

// Routes accessible only by Student
Route::middleware(['auth', 'gakusei'])->group(function() {
	Route::get('/studenthome', 'PagesController@studenthome')->name('studenthome');

	// Control Routes Of Student
	Route::name('student.')->prefix('student')->group(function () {
	    Route::get('show', 'StudentController@show')->name('show');
		Route::get('edit', 'StudentController@edit')->name('edit');
		Route::put('update', 'StudentController@update')->name('update');
		Route::get('setting', function() {
			return redirect()->route('student.edit');
		})->middleware(['password.confirm', 'verified'])->name('setting');
	});
});

//Individual Routes With Controller Middlewares
Route::get('showallstudents', 'StudentController@index')->name('showallstudents');

Route::resource('writing', 'WritingController');
Route::resource('grammar', 'GrammarController');

Route::get('studentwritinglist', 'WritingController@studentwritinglist')->name('writing.studentwritinglist');
Route::get('studentwriting/{id}', 'WritingController@studentwriting')->name('writing.studentwriting');
Route::post('storewriting/{id}', 'WritingController@storewriting')->name('writing.storewriting');
Route::get('checkwriting/{userid}/{writingid}', 'WritingController@checkwriting')->name('writing.checkwriting');
Route::get('showallnew', 'WritingController@showallNew')->name('writing.showallnew');
Route::get('showalldraft', 'WritingController@showallDraft')->name('writing.showalldraft');
Route::get('dictionary', function () { return view('dictionary'); })->name('dictionary');