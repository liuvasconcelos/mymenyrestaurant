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

Route::post('{id}/table/finalize', 'TablesControl\TableDetailController@finalizeTable')->name('finalizeTable');

Route::post('/reservation/do', 'Reservation\ReservationRegisterController@reserveTable') -> name('reserve');

Route::get('/reservation/back', 'Reservation\SeeReservationController@goBack') -> name('goBackToHomeAfterSeeReservation');

Route::get('{id}/reservation/cancelreservation', 'Reservation\SeeReservationController@cancelReservation') -> name('cancelReservation');

Route::get('{id}/table/additemdrink', 'TablesControl\TableDetailController@addItemDrink') -> name('addItemDrink');

Route::get('{id}/table/additemdish', 'TablesControl\TableDetailController@addItemDish') -> name('addItemDish');

Route::get('{id}/table/additemmenu', 'TablesControl\TableDetailController@addItemMenu') -> name('addItemMenu');

Route::get('/table/itensadded', 'TablesControl\AddItensController@addOrder') -> name('addItensAndGoBackToTableControl');

Route::get('/table/goback', 'TablesControl\FinalizeTableController@goBack') -> name('dontFinishTableAndGoBack');

Route::get('{id}/table/couvert', 'TablesControl\FinalizeTableController@addCouvert') -> name('addCouvert');

Route::get('{id}/table/discount', 'TablesControl\FinalizeTableController@discountCoupon') -> name('discountCoupon');

Route::get('{id}/table/finish', 'TablesControl\FinalizeTableController@finishAccount') -> name('finishAccount');

Route::get('{id}/table', 'HomeController@tableDetail') -> name('tableDetail');

Route::post('{id}/table/additens', 'TablesControl\AddItensController@addProductToOrder') -> name('addProductToOrder');

Route::get('{id}/table/couvertadd', 'TablesControl\CouvertController@addCouvert') -> name('couvertAdd');








