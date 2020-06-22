<?php

Route::get('/', 'HomeController@index')->name('welcome');

Route::get('current_tasks', 'TaskController@index')->name('current-tasks');
Route::get('archived_tasks', 'TaskController@archived')->name('archived-tasks');
Route::get('create', 'TaskController@render')->name('create');
Route::post('create_task', 'TaskController@create')->name('create-task');
Route::get('archive/{id}', 'TaskController@archive')->name('archive');
Route::get('edit_task/{id}', 'TaskController@edit')->name('edit');
Route::post('edit_task/{id}/save', 'TaskController@editSave')->name('edit-save');

Route::patch('/edit/{id}', 'TaskController@updateCategory')->name('update-category');
