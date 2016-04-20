<?php

Route::get('/', [
    'as'=>'home',
    'uses'=>'ItemsController@showAll'
]);

Route::post('additem', [
    'as'=>'add-item',
    'uses'=>'ItemsController@addItem'
]);

Route::delete('/delete/{item}', [
    'as' => 'item.delete', 
    'uses'=> 'ItemsController@delete'
]);

Route::get('/viewitem/{item}', [
    'as'=>'item.view', 
    'uses'=>'ItemsController@view'
]);

Route::get('/updateitem/{item}', [
    'as'=>'item.updateView', 
    'uses'=>'ItemsController@updateForm'
]);

Route::post('/update/{item}', [
    'as'=> 'item.update', 
    'uses'=>'ItemsController@update'
]);

Route::get('/rentitem', [
    'as'=>'rent.viewItems', 
    'uses'=>'rentController@view'
]);

Route::post('/rentitem', [
   'as'=>'rent.addRent', 
    'uses'=> 'rentController@add'
]);
