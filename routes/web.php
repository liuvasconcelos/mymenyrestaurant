<?php

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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/reservation', 'HomeController@makeReservation') -> name('makeReserve');

Route::get('/reservation/see', 'HomeController@seeReservation') -> name('seeReservedTable');

Route::get('/table/finalize', 'TablesControl\TableDetailController@finalizeTable')->name('finalizeTable');

Route::get('/reservation/do', 'Reservation\ReservationRegisterController@reserveTable') -> name('reserve');

Route::get('/reservation/back', 'Reservation\SeeReservationController@goBack') -> name('goBackToHomeAfterSeeReservation');

Route::get('/table/additem', 'TablesControl\TableDetailController@addItem') -> name('addItem');

Route::get('/table/itensadded', 'TablesControl\AddItensController@addOrder') -> name('addItensAndGoBackToTableControl');

Route::get('/table/goback', 'TablesControl\FinalizeTableController@goBack') -> name('dontFinishTableAndGoBack');

Route::get('/table/couvert', 'TablesControl\FinalizeTableController@goBack') -> name('addCouvert');

Route::get('/table/discount', 'TablesControl\FinalizeTableController@goBack') -> name('discountCoupon');

Route::get('/table/finish', 'TablesControl\FinalizeTableController@goBack') -> name('finishAccount');

Route::get('{id}/table', 'HomeController@tableDetail') -> name('tableDetail');

Route::post('/table/additens', 'TablesControl\AddItensController@addItem') -> name('addItens');



