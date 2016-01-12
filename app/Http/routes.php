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



Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('geotag', 'HomeController@geotag');
Route::get('dashboard', ['middleware' => 'auth','uses'=>'PagesController@dashboard']);
/* Map */
Route::get('map','MapController@index');
Route::get('viewer','MapController@viewer');
Route::get('mapeditor','MapController@mapeditor');
Route::get('edat','MapController@edat');
Route::get('map-user','MapController@vieweruser');
//Route::get('layerinfo','MapController@layerinfo');

Route::get('form-capture', 'PagesController@formCapture');
Route::get('form-capture-{objectid}-{crypt}', 'PagesController@formCaptureGet');
Route::post('imagestring', 'PagesController@imagestring');
Route::post('editGeotagFoto', 'PagesController@editGeotagFoto');


Route::get('raw','MapController@LayerUser');
Route::get('jsonfield-{id}-{idx}','LayerController@getfields');
Route::get('DMS2Decimal-{degrees}-{minutes}-{seconds}-{direction}','LayerController@DMS2Decimal');
//x 106.81682586111 y -6.5941581666667
Route::get('getfieldInfos','LayerController@getfieldInfos');

/* Layer */
Route::get('layer','LayerController@viewAllLayer');
Route::get('layer-new-layer', 'LayerController@createNewLayer');
Route::post('layer-new-layer', 'LayerController@create');

Route::get('layer/edit/{id}', 'LayerController@editExistingLayer');
Route::post('layer/edit/{id}', 'LayerController@edit');

Route::get('layer/delete/{id}', ['as' => 'layerdelete' ,'uses'=>'LayerController@delete']);

Route::get('layer/create-new-post/success','LayerController@createSuccess');
Route::get('layer/manage-existing-layer/delete/{id}/success','LayerController@deleteSuccess');
Route::get('layer/manage-existing-layer/edit/{id}/success','LayerController@editSuccess');

Route::get('layer-esrihapus-{id}', ['as' => 'layeresrihapus', 'uses' => 'LayerController@LayerEsriHapus']);

Route::get('layerinfo/{id}','LayerController@showFormLayerInfo');
Route::get('layerinfoftr/{id}-{idx}-{layern}','LayerController@showFormLayerInfoPopUp');
Route::post('layerinfoftr/{id}-{idx}-{layern}','LayerController@postFormLayerInfoPopUpCr');

Route::get('layerinfo-sm', 'LayerController@showFormMedia');
Route::post('layerinfosm', 'LayerController@ajaxmedia');
Route::get('rolelayer','LayerController@rolelayer');

Route::get('bookmark','BookmarkController@viewAllBookmark');
Route::get('bookmark-new-bookmark', 'BookmarkController@createNewBookmark');
Route::post('bookmark-new-bookmark', 'BookmarkController@create');

Route::get('bookmark/edit/{id}', 'BookmarkController@editExistingBookmark');
Route::post('bookmark/edit/{id}', 'BookmarkController@edit');

Route::get('bookmark/create-new-bookmark/success','BookmarkController@createSuccess');
Route::get('bookmark/manage-existing-bookmark/delete/{id}/success','BookmarkController@deleteSuccess');
Route::get('bookmark/manage-existing-bookmark/edit/{id}/success','BookmarkController@editSuccess');


Route::get('geotag-list','GeoTagCtrl@index');
Route::get('geotag-edit-{id}','GeoTagCtrl@edit');
Route::post('geotag-edit-{id}','GeoTagCtrl@update');

Route::get('geotag-delete-{id}','GeoTagCtrl@destroy');

Route::get('settingurl','SettingWeb@SettingWebURLForm');
Route::post('settingurl','SettingWeb@SettingWebURLPost');



Route::get('user','UserController@manageExisting');
Route::get('user/edit/{id}', 'UserController@editExisting');
Route::post('user/edit/{id}', 'UserController@edit');
Route::get('user/delete/{id}', 'UserController@delete');
Route::get('user-new-user', 'UserController@createNew');
Route::post('user-new-user', 'UserController@create');
Route::get('user-nonaktif-{id}', ['as' => 'usernonaktif','uses'=>'UserController@NAUser']);

Route::get('user/create-new-user/success','UserController@createSuccess');
Route::get('user/manage-existing-user/edit/{id}/success','UserController@editSuccess');
Route::get('user/manage-existing-user/delete/{id}/success','UserController@deleteSuccess');


Route::get('cauth/login', 'CustomAuthController@getLogin');   
Route::post('cauth/login', 'CustomAuthController@postLogin');
Route::get('login/editor', 'CustomAuthController@getLoginEditor');   
Route::post('login/editor', 'CustomAuthController@postLoginEditor');
Route::get('cauth/logout', 'CustomAuthController@getLogout');

Route::get('login', function(){
	return Redirect::to('login/editor');
}); 


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

