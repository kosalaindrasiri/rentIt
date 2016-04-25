<?php

Route::get('/', function () {
    return redirect('dashboard');
});

Route::group(['middleware' => 'web'], function() {

    Route::post('/items', [
        'as' => 'items.add',
        'uses' => 'ItemsController@addItem'
    ]);

    Route::delete('items/{item}', [
        'as' => 'items.delete',
        'uses' => 'ItemsController@delete'
    ]);

    Route::put('items/{item}', [
        'as' => 'items.update',
        'uses' => 'ItemsController@update'
    ]);

    Route::post('/rent', [
        'as' => 'rents.add',
        'uses' => 'RentController@add'
    ]);

    Route::group(['prefix' => 'dashboard/'], function() {

        Route::get('/', [
            'as' => 'dashboard.home',
            'uses' => 'ItemsController@showAll'
        ]);

        Route::get('items/{item}', [
            'as' => 'dashboard.items.one',
            'uses' => 'ItemsController@view'
        ]);

        Route::get('items/{item}/update', [
            'as' => 'dashboard.items.one.update',
            'uses' => 'ItemsController@updateForm'
        ]);

        Route::get('/rents', [
            'as' => 'dashboard.rents.all',
            'uses' => 'RentController@view'
        ]);
    });

    Route::auth();
});
