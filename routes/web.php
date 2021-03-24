<?php

use Illuminate\Support\Facades\Auth;
use App\Settings;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;
use Symfony\Component\Routing\Route as ComponentRoutingRoute;

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



//Route::get('/nedmin','backend\DefaultController@index')-> name('nedmin.Index');


Route::namespace('Frontend')->group(function(){

    //Home
    Route::get('/','DefaultController@index')->name('home.index');
    
    //Blogs
   
    Route::get('/blogs','BlogsController@index')->name('blogss.index');
    Route::get('/blogs/{slugs}','BlogsController@detail')->name('blogs.detail');

    //Pages
   
    Route::get('/pages/{slugs}','PagesController@detail')->name('pages.detail');

    //Contact
    Route::get('/contact','DefaultController@contact')->name('contact.detail');

});

Route::namespace('backend')->group(function(){
    Route::prefix('nedmin')->group(function(){

        Route::get('/','DefaultController@index')-> name('nedmin.Index')->middleware('admin');
        Route::get('/login','DefaultController@login')-> name('nedmin.Login')->middleware('CheckLogin');
        Route::get('/logout','DefaultController@logout')-> name('nedmin.Logout');
        Route::post('/login','DefaultController@authenticate')->name('nedmin.Authenticate');

    });
});



Route::middleware(['admin'])->group(function() {
Route::namespace('backend')->group(function(){    
    Route::prefix('nedmin/settings')->group(function(){

        Route::get('/','SettingsController@index')-> name('settings.Index')->middleware('admin');
        Route::post('','SettingsController@sortable')-> name('settings.Sortable');
        Route::get('/edit/{id}','settingsController@edit')->name('settings.Edit');
        Route::get('/delete/{id}','SettingsController@destroy')->name('settings.Destroy');
        Route::post('/{id}','settingsController@update')->name('settings.Update');

    });
});
});

Route::middleware(['admin'])->group(function() {
Route::namespace('backend')->group(function(){
    Route::prefix('nedmin')->group(function(){

        //Blog
        Route::post('/blogs/sortable','BlogsController@sortable')->name('blogs.Sortable');
        Route::resource('blogs', 'BlogsController');

        //Page
        Route::post('/pages/sortable','PagesController@sortable')->name('pages.Sortable');
        Route::resource('pages', 'PagesController');
                
        //Slider
        Route::post('/sliders/sortable','SlidersController@sortable')->name('sliders.Sortable');
        Route::resource('sliders', 'SlidersController');
  
        //User
        Route::post('/users/sortable','SlidersController@sortable')->name('users.Sortable');
        Route::resource('users', 'UsersController');
    });
});
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
