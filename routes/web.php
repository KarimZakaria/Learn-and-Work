<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['namespace' => 'Front'] , function()
{
    Route::get('homepage' , 'HomePageController@index')->name('Front.Homepage'); //Name for Routes using Not Views
    Route::get('category/{id}' , 'CategoryController@category')->name('Front.Category');
    Route::get('category/{id}/course/{courseId}' , 'CategoryController@show')->name('Front.show');
    Route::get('search/{id}' , 'CourseController@search')->name('Course.Search');
    Route::get('trainer' , 'TrainerController@index')->name('AllTrainers');
    Route::get('trainers/{id}' , 'TrainerController@show')->name('Trainer');
    Route::get('courses' , 'CourseController@index')->name('Courses');
    Route::get('contact' , 'ContactController@index')->name('Contact') ;
    Route::post('message/newsletter' , 'MessageController@newsletter')->name('Newsletter') ;
    Route::post('message/messages' , 'MessageController@message')->name('Message') ;
    Route::post('message/enroll' , 'MessageController@enroll')->name('Enroll') ;
    // Start Job Routes
    Route::get('jobs' , 'JobController@index')->name('Front.Jobs');
    Route::get('jobs/{id}' , 'JobController@show')->name('Front.Jobs.Show');

    Route::post('job/enroll' , 'MessageController@jobEnroll')->name('Job.Enroll') ;
});
Route::get('/home', 'HomeController@index')->name('home');






