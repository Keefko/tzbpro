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


use Illuminate\Support\Facades\Auth;
use UniSharp\LaravelFilemanager\Lfm;

Route::get('/', function () {
    return view('homepage');
});



Route::get('/profesie', 'ServiceController@index');
Route::get('/kontakt', 'ContactController@get');
Route::get('/referencie', 'TestimonialController@index');
Route::get('/page/{$slug}','PageController@show');
Route::get('/{$type}', 'TestimonialController@show');


Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function() {

    Route::resource('user', 'UserController');
    Route::resource('page', 'PageController');
    Route::resource('service', 'ServiceController');
    Route::resource('section', 'SectionController');
    Route::resource('contact', 'ContactController');
    Route::resource('member', 'MemberController');
    Route::resource('testimonial', 'TestimonialController');
    Route::resource('type', 'TypeController');

    Route::get('/dashboard', 'UserController@index');

    Route::get('/dashboard/menu',function (){
        return view('dashboard.menu');
    });

    //page routes

    Route::get('/dashboard/page',function (){
        return view('dashboard.page.index');
    });

    Route::get('/page/{{$page->id}}/edit', function (){
        return view('dashboard.page.edit');
    });

    //services routes

    Route::get('/dashboard/profesie', 'ServiceController@indexDash');

    Route::get('/service/{{$service->id}}/edit', function (){
        return view('dashboard.services.edit');
    });

    //section routes

    Route::get('/dashboard/sekcie', 'SectionController@indexDash');

    //contact routes

    Route::get('/dashboard/kontakt', 'ContactController@getDash');

    //testimonials routes
    Route::get('/dashboard/referencie', 'TestimonialController@indexDash');

    Route::group(['prefix' => 'laravel-filemanager'], function () {
        Lfm::routes();
    });

    //menu routes
    Route::post('/dashboard/menu/addcustommenu', array('as' => 'haddcustommenu', 'uses' => '\Harimayco\Menu\Controllers\MenuController@addcustommenu'));
    Route::post('/dashboard/menu//deleteitemmenu', array('as' => 'hdeleteitemmenu', 'uses' => '\Harimayco\Menu\Controllers\MenuController@deleteitemmenu'));
    Route::post('/dashboard/menu//deletemenug', array('as' => 'hdeletemenug', 'uses' => '\Harimayco\Menu\Controllers\MenuController@deletemenug'));
    Route::post('/dashboard/menu//createnewmenu', array('as' => 'hcreatenewmenu', 'uses' => '\Harimayco\Menu\Controllers\MenuController@createnewmenu'));
    Route::post('/dashboard/menu//generatemenucontrol', array('as' => 'hgeneratemenucontrol', 'uses' => '\Harimayco\Menu\Controllers\MenuController@generatemenucontrol'));
    Route::post('/dashboard/menu//updateitem', array('as' => 'hupdateitem', 'uses' => '\Harimayco\Menu\Controllers\MenuController@updateitem'));

});



