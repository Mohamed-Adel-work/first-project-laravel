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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/', function () {
    return 'Home';
});


Route::get('/dashboard', function () {
    return 'dashboard';
});

Route::get('/redirect/{services}', 'SocialController@redirect');

Route::get('/callback/{services}', 'SocialController@callback');

Route::get('fillable', 'CrudController@getOffers');

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

Route::group(['prefix' => 'offers'], function () {
    // Route::get('store', 'CrudController@store');


        Route::get('create', 'CrudController@create');
        Route::post('store', 'CrudController@store')->name('offers.store');

        Route::get('edit/{offer_id}', 'CrudController@editOffer');
        Route::post('update/{offer_id}', 'CrudController@updateOffer')->name('offers.update');

        Route::get('all', 'CrudController@getAllOffers');

    });

    Route::get('youtube', 'CrudController@getVideo');

});

// -----------------------------------------------------------

// ولكن هنا لا ينصح بكتابة اي كود

// Route::get('/', function () {

//   $data = []; // But this works best for big projects
//   $data['name'] = 'Mohamed Adel';
//   $data['id'] = 1;
//   $data['age'] = 15;

//   return view('welcome', $data);//->with([ 'string' => 'Mohamed Adel', 'age' => 15 ]); // And but this works best for small projects 

// });

// Route::get('index', 'Front\UserController@getIndex');

// Route::get('profile', function () {
//   return "This Is Profile Page";
// });

// Route::get('/landing', function () {
//   return view('landing');
// });

// Route::get('/about-us', function () {
//   return view('about');
// });


// route parameters

// This Is Means show-number{id} you must be write the {id}
// Route::get('show-number{id}', function ($id) {
//   return $id;
// });

// route name

// Route::namespace('Front')->group(function() {

//   // All routes only access controller or methods in folder name Front

//   Route::get('users','UserController@showUserName');
// });

// Route::prefix('users')->group(function() {
//   Route::get('show', 'UserController@showUserName');
//   Route::delete('delete', 'UserController@showUserName');
//   Route::get('edit', 'UserController@showUserName');
//   Route::put('update', 'UserController@showUserName');
// });

// Route::group(['prefix' => 'users', 'middleware' => 'auth' ], function () {

//   // set of routes

//   Route::get('/', function () {
//     return 'Work';
//   });

//   Route::get('show', 'UserController@showUserName');
//   Route::delete('delete', 'UserController@showUserName');
//   Route::get('edit', 'UserController@showUserName');
//   Route::put('update', 'UserController@showUserName');

// });


// Route::get('check', function () {
//   return 'middleware';
// })->middleware('auth');

// // Route::get('second', 'Admin\SecondController@showString');

// Route::group(['namespace' => 'Admin'], function () {
//   Route::get('second0', 'SecondController@showString0')->middleware('auth');
//   Route::get('second1', 'SecondController@showString1');
//   Route::get('second2', 'SecondController@showString2');
//   Route::get('second3', 'SecondController@showString3');
// });

// Route::get('login', function () {
//   return 'Must Br Login To Access This Route';
// })->name('login');

// Route::get('users', 'UserController@index');

// Route::group(['middelware' => 'auth'], function () {
//   Route::get('users', 'UserController@index');
// });

// Route::get('news', 'NewsController@index');
// Route::post('news', 'NewsController@store');
// Route::get('news/create', 'NewsController@create');
// Route::get('news/{id}/edit', 'NewsController@edit');
// Route::post('update/{id}', 'NewsController@update');
// Route::delete('news/{id}', 'NewsController@delete');
//   -
//   -
//   -
//   -
//   -
//   -
// Use All This
// Route::resource('news', 'NewsController');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');