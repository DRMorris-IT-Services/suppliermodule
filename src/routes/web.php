<?php

Route::group(['namespace' => 'duncanrmorris\suppliers\Http\Controllers'], function()
{
    Route::group(['middleware' => ['web', 'auth']], function(){
    
        #### SUPPLIERS MODULE ####
	Route::get('suppliers', 'SuppliersController@index')->name('suppliers');
	Route::get('suppliers/new', 'SuppliersController@create')->name('suppliers.new');
	Route::put('suppliers/add', 'SuppliersController@store')->name('suppliers.add');
	Route::put('suppliers/rm/{id}', 'SuppliersController@destroy')->name('suppliers.del');
	Route::get('suppliers/update/{id}', 'SuppliersController@edit')->name('suppliers.edit');
	Route::put('suppliers/save/{id}', 'SuppliersController@update')->name('suppliers.update');
	Route::get('suppliers/{id}', 'SuppliersController@show')->name('suppliers.view');
	#### SUPPLIERS CONTACTS ####
	Route::put('suppliers/contact-add', 'SuppliersController@contactadd')->name('suppliers.contact.add');
	Route::put('suppliers/contact-edit/{id}', 'SuppliersController@contactedit')->name('suppliers.contact.edit');
	Route::put('suppliers/contact-del/{id}', 'SuppliersController@contactdel')->name('suppliers.contact.del');
	#### SUPPLIERS CRM ###
	Route::get('suppliers/crm-add/{id}', 'SuppliersContactHistoryController@create')->name('suppliers.crm.add');
	Route::put('suppliers/crm-save/{id}', 'SuppliersContactHistoryController@store')->name('suppliers.crm.save');
	Route::get('suppliers/crm-view/{id}', 'SuppliersContactHistoryController@show')->name('suppliers.crm.view');
	Route::get('suppliers/crm-edit/{id}/{cid}', 'SuppliersContactHistoryController@edit')->name('suppliers.crm.edit');
	Route::put('suppliers/crm-update/{id}/{cid}', 'SuppliersContactHistoryController@update')->name('suppliers.crm.update');
	Route::put('suppliers/crm-del/{id}', 'SuppliersContactHistoryController@destroy')->name('suppliers.crm.del');

   

    });
});