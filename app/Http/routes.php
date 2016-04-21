<?php

Route::get('/', [
    'as'=>'home',
    'uses'=>'ItemsController@showAll'
]);

Route::post('/items', [
    'as'=>'add-item',
    'uses'=>'ItemsController@addItem'
]);

Route::delete('items/{item}', [
    'as' => 'item.delete', 
    'uses'=> 'ItemsController@delete'
]);

Route::get('items/{item}', [
    'as'=>'item.view', 
    'uses'=>'ItemsController@view'
]);

Route::get('items/updateview/{item}', [
    'as'=>'item.updateView', 
    'uses'=>'ItemsController@updateForm'
]);

Route::post('items/{item}', [
    'as'=> 'item.update', 
    'uses'=>'ItemsController@update'
]);

Route::get('/rent', [
    'as'=>'rent.viewItems', 
    'uses'=>'RentController@view'
]);

Route::post('/rent', [
   'as'=>'rent.addRent', 
    'uses'=> 'RentController@add'
]);
