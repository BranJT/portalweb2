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

Route::get('/', 'PortalController@index')->name('portal');
Route::get('/contact', 'PortalController@getContact')->name('contact');
Route::post('/store/mensaje', 'PortalController@storeMensaje');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/usuario/create', 'HomeController@createUsuario');
Route::get('/usuario/destroy', 'HomeController@destroyUsuario');


Route::get('/presentacion', 'PresentacionController@index')->name('presentacion_index');
Route::get('/presentacion/editar' , 'PresentacionController@edit');
Route::post('/presentacion/update' , 'PresentacionController@update');

Route::get('/producto/editar/{id}' , 'PresentacionController@editProducto');
Route::post('/producto/update/{id}' , 'PresentacionController@updateProducto');
Route::post('/producto/destroy/{id}' , 'PresentacionController@destroyProducto');

Route::get('/empleo/create' , 'PresentacionController@createEmpleo');
Route::get('/empleo/editar/{id}' , 'PresentacionController@editEmpleo');
Route::post('/empleo/update/{id}' , 'PresentacionController@updateEmpleo');
Route::post('/empleo/destroy/{id}' , 'PresentacionController@destroyEmpleo');

Route::get('/empleo/{id}/detalle/' , 'PresentacionController@indexEmpleoDetalle');
/*
Route::get('/empleo/{id}/buscamos/create' , 'PresentacionController@createBuscamos');
Route::get('/empleo/{id}/buscamos/edit/{id}' , 'PresentacionController@editBuscamos');
Route::post('/empleo/{id}/buscamos/update/{id}' , 'PresentacionController@updateBuscamos');
Route::post('/buscamos/{id}/detalle' , 'PresentacionController@destroyBuscamos');

Route::get('/empleo/{id}/requisito/create' , 'PresentacionController@createRequisito');
Route::get('/empleo/{id}/requisito/edit/{id}' , 'PresentacionController@editRequisito');
Route::post('/empleo/{id}/requisito/update/{id}' , 'PresentacionController@updateRequisito');
Route::post('/requisito/{id}/detalle' , 'PresentacionController@destroyRequisito');

*/

Route::get('/mensaje' , 'MensajeController@index');
Route::get('/mensaje/visto/{id}' , 'MensajeController@marcarVisto');

Route::get('/blog' , 'BlogController@index');
Route::get('/blog/create' , 'BlogController@create');
Route::post('/blog/store' , 'BlogController@store');
Route::get('/blog/edit/{id}' , 'BlogController@edit');
Route::put('/blog/update/{id}' , 'BlogController@update');
Route::get('/blog/portada/{id}' , 'BlogController@hacerPortada');
Route::delete('/blog/eliminar/{id}' , 'BlogController@destroy');
Route::get('/blog/downloadPDF/{id}' , 'BlogController@downloadPDF');