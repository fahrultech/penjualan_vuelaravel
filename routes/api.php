<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Item Route
Route::get('item/vuedatatable', 'Api\ItemController@vueDatatables')->name('item.vuedatatable');
Route::resource('item', 'Api\ItemController');

// Category Route
Route::get('category/vuedatatable', 'Api\CategoryController@vueDatatables')->name('category.vuedatatable');
Route::resource('category', 'Api\CategoryController');

// Supplier Route
Route::get('supplier/vuedatatable','Api\SubcategoryController@vueDatatables')->name('supplier.vuedatatable');
Route::resource('supplier', 'Api\SupplierController');

// Customer Route
Route::get('customer/vuedatatable', 'Api\CategoryController@vueDatatables')->name('customer.vuedatatable');
Route::resource('customer', 'Api\CustomerController');
