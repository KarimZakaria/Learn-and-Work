<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Admin')->prefix('admin-dashboard')->group(function()
{    
    Route::get('login' , 'AdminAuthController@login')->name('Admin.Login');    
    Route::post('confirm' , 'AdminAuthController@confirm')->name('Admin.Confirm');

    // Start Routes For Admins Or The Editors Using MiddleWare 
    Route::middleware('adminAuth:admin')->group(function()
    {
        Route::get('/' , 'AdminController@index')->name('AdminDashboard'); 
        Route::get('/logout' , 'AdminAuthController@logout')->name('Logout');

        // Start Category CRUD 
        Route::prefix('categories')->group(function()
        {
            Route::get('' , 'CategoryController@index')->name('Admin.Category.index');
            Route::get('create' , 'CategoryController@create')->name('Admin.Category.create');
            Route::post('store' , 'CategoryController@store')->name('Admin.Category.store');
            Route::get('show/{id}' , 'CategoryController@show')->name('Admin.Category.show');
            Route::get('edit/{id}' , 'CategoryController@edit')->name('Admin.Category.edit');
            Route::post('update' , 'CategoryController@update')->name('Admin.Category.update');
            Route::get('destroy/{id}' , 'CategoryController@destroy')->name('Admin.Category.destroy');
            Route::get('trashed' , 'CategoryController@trashed')->name('Admin.Category.Trashed');
            Route::get('trashed/{id}' , 'CategoryController@restore')->name('Admin.Category.Restore');
        });        
        // End Category CRUD
        
        // Start Places CRUD
        Route::prefix('places')->group(function()
        {
            Route::get('' , 'PlaceController@index')->name('Admin.Place.index');
            Route::get('create' , 'PlaceController@create')->name('Admin.Place.create');
            Route::post('store' , 'PlaceController@store')->name('Admin.Place.store') ;
            Route::get('show/{id}' , 'PlaceController@show')->name('Admin.Place.show');
            Route::get('edit/{id}' , 'PlaceController@edit')->name('Admin.Place.edit') ;    
            Route::post('update' , 'PlaceController@update')->name('Admin.Place.update');            
            Route::get('destroy/{id}' , 'PlaceController@destroy')->name('Admin.Place.destroy');
        });
        // End Of Places CRUD 

        // Start Trainer CRUD
        Route::prefix('trainers')->group(function()
        {
            Route::get('' , 'TrainerController@index')->name('Admin.Trainer.index');            
            Route::get('create' , 'TrainerController@create')->name('Admin.Trainer.create');
            Route::post('store' , 'TrainerController@store')->name('Admin.Trainer.store') ;
            Route::get('show/{id}' , 'TrainerController@show')->name('Admin.Trainer.show');
            Route::get('edit/{id}' , 'TrainerController@edit')->name('Admin.Trainer.edit');
            Route::post('update' , 'TrainerController@update')->name('Admin.Trainer.update');
            Route::get('destroy/{id}' , 'TrainerController@destroy')->name('Admin.Trainer.destroy');
            Route::get('trashed' , 'TrainerController@trashed')->name('Admin.Trainer.Trashed') ;
            Route::get('trashed/{id}' , 'TrainerController@restore')->name('Admin.Trainer.Restore')  ;
        });

        // End Trainer CRUD

        // Start Course CRUD
        Route::prefix('courses')->group(function()
        {
            Route::get('' , 'CourseController@index')->name('Admin.Course.index');            
            Route::get('create' , 'CourseController@create')->name('Admin.Course.create');
            Route::post('store' , 'CourseController@store')->name('Admin.Course.store') ;
            Route::get('show/{id}' , 'CourseController@show')->name('Admin.Course.show');
            Route::get('edit/{id}' , 'CourseController@edit')->name('Admin.Course.edit');
            Route::post('update' , 'CourseController@update')->name('Admin.Course.update');
            Route::get('destroy/{id}' , 'CourseController@destroy')->name('Admin.Course.destroy');
            Route::get('trashed' , 'CourseController@trashed')->name('Admin.Course.Trashed') ;
            Route::get('trashed/{id}' , 'CourseController@restore')->name('Admin.Course.Restore')  ;
            Route::get('search/{id}' , 'CourseController@search')->name('Course.Search');
        });
        // End Of Course CRUD

        // Start Student CRUD
        Route::prefix('students')->group(function()
        {
            Route::get('' , 'StudentController@index')->name('Admin.Student.index');            
            Route::get('create' , 'StudentController@create')->name('Admin.Student.create');
            Route::post('store' , 'StudentController@store')->name('Admin.Student.store') ;
            Route::get('show/{id}' , 'StudentController@show')->name('Admin.Student.show');
            Route::get('showCourses/{id}' , 'StudentController@showCourses')->name('Admin.Student.showCourses');
            Route::get('edit/{id}' , 'StudentController@edit')->name('Admin.Student.edit');
            Route::post('update' , 'StudentController@update')->name('Admin.Student.update');
            Route::get('destroy/{id}' , 'StudentController@destroy')->name('Admin.Student.destroy');
            Route::get('{id}/courses/{cId}/approve' , 'StudentController@approve')->name('Admin.Student.approve');
            Route::get('{id}/courses/{cId}/reject' , 'StudentController@reject')->name('Admin.Student.reject');
        });
        // End Of Student CRUD

        // Start Job Crud 
        Route::prefix('jobs')->group(function()
        {
            Route::get('' , 'JobController@index')->name('Admin.Job.index');            
            Route::get('create' , 'JobController@create')->name('Admin.Job.create');
            Route::post('store' , 'JobController@store')->name('Admin.Job.store') ;
            Route::get('show/{id}' , 'JobController@show')->name('Admin.Job.show');
            Route::get('edit/{id}' , 'JobController@edit')->name('Admin.Job.edit');
            Route::post('update' , 'JobController@update')->name('Admin.Job.update');
            Route::get('destroy/{id}' , 'JobController@destroy')->name('Admin.Job.destroy');
            Route::get('trashed' , 'JobController@trashed')->name('Admin.Job.Trashed') ;
            Route::get('trashed/{id}' , 'JobController@restore')->name('Admin.Job.Restore')  ;
            Route::get('search/{id}' , 'JobController@search')->name('Job.Search');
        });

        // Start User Routes 
        Route::prefix('users')->group(function()
        {
            Route::get('' , 'UserController@index')->name('AllUsers'); 
            Route::get('destroy/{id}' , 'UserController@destroy')->name('Admin.User.destroy'); 
        });
    });

});

Route::namespace('Auth')->prefix('users')->middleware('auth')->group(function(){

    Route::get('dashborad' , 'UserController@index')->name('User.Dashboard') ; 

    Route::get('createCategory' , 'UserController@createCategory')->name('User.createCategory') ; 
    Route::post('storeCategory' , 'UserController@storeCategory')->name('User.storeCategory') ; 

    Route::get('createCourse' , 'UserController@createCourse')->name('User.createCourse') ; 
    Route::post('storeCourse' , 'UserController@storeCourse')->name('User.storeCourse') ; 

    Route::get('createTrainer' , 'UserController@createTrainer')->name('User.createTrainer') ; 
    Route::post('storeTrainer' , 'UserController@storeTrainer')->name('User.storeTrainer') ; 

    Route::get('createJob' , 'UserController@createJob')->name('User.createJob') ; 
    Route::post('storeJob' , 'UserController@storeJob')->name('User.storeJob') ; 


}) ; 


