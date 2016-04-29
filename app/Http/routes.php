<?php

Route::get('/', function () {
    return redirect('dashboard');
});

Route::group(['middleware' => 'auth'], function() {

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

    Route::post('/update-rent', [
        'as' => 'rents.update',
        'uses' => 'RentController@update'
    ]);

    Route::post('/customers/create', [
        'as' => 'customers.add',
        'uses' => 'CustomerController@add'
    ]);

    Route::put('customers/{customer}', [
        'as' => 'customers.update',
        'uses' => 'CustomerController@update'
    ]);

    Route::delete('customers/{customer}', [
        'as' => 'customers.delete',
        'uses' => 'CustomerController@delete'
    ]);

    Route::group(['prefix' => 'dashboard/'], function() {

        Route::get('/', [
            'as' => 'dashboard.home',
            'uses' => 'homePageController@showAll'
        ]);

        Route::get('/items', [
            'as' => 'dashboard.items.all',
            'uses' => 'ItemsController@showAll'
        ]);

        Route::get('/items/create', [
            'as' => 'dashboard.items.create',
            'uses' => 'ItemsController@create'
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

        Route::get('/customers/create', [
            'as' => 'dashboard.customers.create',
            'uses' => 'CustomerController@create'
        ]);

        Route::get('/add-rent', [
            'as' => 'dashboard.rents.create',
            'uses' => 'RentController@create'
        ]);

        Route::get('/edit-rent/{id}', [
            'as' => 'dashboard.rents.edit',
            'uses' => 'RentController@edit'
        ]);

        Route::get('/delete-rent/{id}', [
            'as' => 'dashboard.rents.delete',
            'uses' => 'RentController@delete'
        ]);

        Route::get('customers', [
            'as' => 'dashboard.customers.all',
            'uses' => 'CustomerController@showAll'
        ]);

        Route::get('customers/{customer}', [
            'as' => 'dashboard.customers.one',
            'uses' => 'CustomerController@view'
        ]);

        Route::get('customers/{customer}/update', [
            'as' => 'dashboard.customers.one.update',
            'uses' => 'CustomerController@updateForm'
        ]);
    });
});

Route::auth();
