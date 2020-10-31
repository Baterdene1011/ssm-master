<?php

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
    return redirect()->route('login');
});


// Demo routes
// Route::get('/', 'HomeController@index');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');
Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/flaticon', 'PagesController@flaticon');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');

Route::get('/login', 'LoginRestController@login')->name('login');
Route::post('/restlogin', 'LoginRestController@index')->name('restlogin');

// Route::group(['middleware' => ['admin']], function () {
    /**
     * Reference
     */
    Route::get('/itemtypehome', 'ItemTypeController@index')->name('itemtypehome');
    Route::post('/itemtype', 'ItemTypeController@loadData')->name('itemtype');
    Route::post('/itemtype/create', 'ItemTypeController@createForm')->name('itemTypeCreateForm');
    Route::post('/itemtype/save', 'ItemTypeController@save')->name('itemTypeSave');
    Route::post('/itemtype/edit', 'ItemTypeController@editForm')->name('itemTypeEditForm');
    Route::post('/itemtype/update', 'ItemTypeController@update')->name('itemTypeUpdate');
    Route::post('/itemtype/delete', 'ItemTypeController@delete')->name('itemTypeDelete');

    /**
     * Module
     */
    Route::get('/item', 'ItemController@index')->name('item');
    Route::post('/item/data', 'ItemController@loadData')->name('itemdata');
    Route::post('/item/create', 'ItemController@createForm')->name('itemCreateForm');
    Route::post('/item/save', 'ItemController@save')->name('itemSave');
    Route::post('/itemtype/edit', 'ItemTypeController@editForm')->name('itemTypeEditForm');
    Route::post('/itemtype/update', 'ItemTypeController@update')->name('itemTypeUpdate');
    Route::post('/itemtype/delete', 'ItemTypeController@delete')->name('itemTypeDelete');
    Route::post('/item/convertphoto', 'ItemController@convertPhoto')->name('convertItemPhoto');

    /**
     * Selectable Grid
     */
    Route::post('/employeeSelectableGrid', 'CommonController@employee')->name('employeeSelectableGrid');
    Route::post('/autoCompletePopup', 'CommonController@autoComplete')->name('autoCompletePopup');
    Route::post('/selectableGridData', 'CommonController@selectableGridData')->name('selectableGridData');
    Route::post('/routeSelectableGrid', 'CommonController@route')->name('routeSelectableGrid');
    Route::post('/salesEmployeeSelectableGrid', 'CommonController@salesEmployee')->name('salesEmployeeSelectableGrid');
    Route::post('/itemSelectableGrid', 'CommonController@item')->name('itemSelectableGrid');
// });
