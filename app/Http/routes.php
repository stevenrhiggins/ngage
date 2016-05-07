<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'FluidController@index');
Route::get('thesource', 'MainController@thesource');
Route::get('thesource_all', 'MainController@thesource_all');
Route::get('date', 'MainController@change_date_format');
Route::get('testsource', 'TestingController@thesource');

//pharma
Route::get('coupons', 'PharmaController@get_coupons');
Route::get('email', 'PharmaController@email');
Route::get('pharma_report', 'PharmaController@create_pharma_report');
Route::get('sftp', 'SftpController@index');

//turtle jacks
Route::get('tj/report', 'TurtleJacksController@stores_and_districts');

Route::get('barcode', 'TurtleJacksController@barcode');
//Route::get('tj/{question}', 'TurtleJacksController@coporate_rating');