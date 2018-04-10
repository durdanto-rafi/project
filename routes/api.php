<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// List roleType
Route::get('roleTypes', 'roleTypeController@index');

// List single roleType
Route::get('roleType/{id}', 'roleTypeController@show');

// Create new roleType
Route::post('roleType', 'roleTypeController@store');

// Update roleType
Route::put('roleType', 'roleTypeController@store');

// Delete roleType
Route::delete('roleType/{id}', 'roleTypeController@destroy');

#Account routes
// List account
Route::get('accounts', 'AccountController@index');
// List single account
Route::get('account/{id}', 'AccountController@show');
// Create new account
Route::post('account', 'AccountController@store');
// Update account
Route::put('account', 'AccountController@store');
// Delete account
Route::delete('account/{id}', 'AccountController@destroy');
#Company Routes
// List companies
Route::get('companies', 'CompanyController@index');
// List single company
Route::get('company/{id}', 'CompanyController@show');
// Create new company
Route::post('company', 'CompanyController@store');
// Update company
Route::put('company', 'CompanyController@store');
// Delete company
Route::delete('company/{id}', 'CompanyController@destroy');

#Contact Routes
// List Contacts
Route::get('contacts', 'ContactController@index');
// List single Contact
Route::get('contact/{id}', 'ContactController@show');
// Create new Contact
Route::post('contact', 'ContactController@store');
// Update Contact
Route::put('contact', 'ContactController@store');
// Delete Contact
Route::delete('contact/{id}', 'ContactController@destroy');
#Block Routes
// List Blocks
Route::get('blocks', 'BlockController@index');
// List single Blocks
Route::get('block/{id}', 'BlockController@show');
// Create new Blocks
Route::post('block', 'BlockController@store');
// Update Blocks
Route::put('block', 'BlockController@store');
// Delete Blocks
Route::delete('block/{id}', 'BlockController@destroy');
#Block Status Routes
// List block status
Route::get('blockstats', 'BlockStatController@index');
// List block status
Route::get('blockstat/{id}', 'BlockStatController@show');
// Create new block status
Route::post('blockstat', 'BlockStatController@store');
// Update block status
Route::put('blockstat', 'BlockStatController@store');
// Delete block status
Route::delete('blockstat/{id}', 'BlockStatController@destroy');
#Module Status Routes
// List block status
Route::get('modules', 'ModuleController@index');
// List block status
Route::get('module/{id}', 'ModuleController@show');
// Create new block status
Route::post('module', 'ModuleController@store');
// Update block status
Route::put('module', 'ModuleController@store');
// Delete block status
Route::delete('module/{id}', 'ModuleController@destroy');

#Model Status Routes
// List model
Route::get('models', 'ModelController@index');
// List block status
Route::get('model/{id}', 'ModelController@show');
// Create new block status
Route::post('model', 'ModelController@store');
// Update block status
Route::put('model', 'ModelController@store');
// Delete block status
Route::delete('model/{id}', 'ModelController@destroy');

#Spares Status Routes
// List spares
Route::get('spares', 'SparesController@index');
// List block status
Route::get('spare/{id}', 'SparesController@show');
// Create new block status
Route::post('spare', 'SparesController@store');
// Update block status
Route::put('spare', 'SparesController@store');
// Delete block status
Route::delete('spare/{id}', 'SparesController@destroy');

#Asset Routes
// List Assets
Route::get('assets', 'AssetController@index');
// List asset status
Route::get('asset/{id}', 'AssetController@show');
// Create new asset status
Route::post('asset', 'AssetController@store');
// Update asset status
Route::put('asset', 'AssetController@store');
// Delete asset status
Route::delete('asset/{id}', 'AssetController@destroy');

#Asset Model Routes
// List Asset Models
Route::get('assetmodels', 'AssetModelController@index');
// List asset model 
Route::get('assetmodel/{id}', 'AssetModelController@show');
// Create new asset model
Route::post('assetmodel', 'AssetModelController@store');
// Update asset model
Route::put('assetmodel', 'AssetModelController@store');
// Delete asset model
Route::delete('assetmodel/{id}', 'AssetModelController@destroy');

# Model Type Routes
// List Model Types
Route::get('modeltypes', 'ModelTypeController@index');
// List asset model 
Route::get('modeltype/{id}', 'ModelTypeController@show');
// Create new asset model
Route::post('modeltype', 'ModelTypeController@store');
// Update asset model
Route::put('modeltype', 'ModelTypeController@store');
// Delete asset model
Route::delete('modeltype/{id}', 'ModelTypeController@destroy');

# Account Block Association Routes
// List Account Block Associations Types
Route::get('accountblockassociations', 'AccountBlockAssociationController@index');
// List Account Block Association 
Route::get('accountblockassociation/{id}', 'AccountBlockAssociationController@show');
// Create new Account Block Association
Route::post('accountblockassociation', 'AccountBlockAssociationController@store');
// Update Account Block Association
Route::put('accountblockassociation', 'AccountBlockAssociationController@store');
// Delete Account Block Association
Route::delete('accountblockassociation/{id}', 'AccountBlockAssociationController@destroy');

# Customer Block Association Routes
// List Customer Block Associations
Route::get('customerblockassociations', 'CustomerBlockAssociationController@index');
// List Customer Block Association 
Route::get('customerblockassociation/{id}', 'CustomerBlockAssociationController@show');
// Create new Customer Block Association
Route::post('customerblockassociation', 'CustomerBlockAssociationController@store');
// Update Customer Block Association
Route::put('customerblockassociation', 'CustomerBlockAssociationController@store');
// Delete Customer Block Association
Route::delete('customerblockassociation/{id}', 'CustomerBlockAssociationController@destroy');

# Customer Block Module Activity Routes
// Customer Block Module Activities
Route::get('customerblockmoduleactivities', 'CustomerBlockModuleActivityController@index');
// Customer Block Module Activity
Route::get('customerblockmoduleactivity/{id}', 'CustomerBlockModuleActivityController@show');
// Create new Customer Block Module Activity
Route::post('customerblockmoduleactivity', 'CustomerBlockModuleActivityController@store');
// Update Customer Block Module Activity
Route::put('customerblockmoduleactivity', 'CustomerBlockModuleActivityController@store');
// Delete Customer Block Module Activity
Route::delete('customerblockmoduleactivity/{id}', 'CustomerBlockModuleActivityController@destroy');

# Activity Routes
// List Activities
Route::get('activities', 'ActivityController@index');
//  Activity
Route::get('activity/{id}', 'ActivityController@show');
// Create new Activity
Route::post('activity', 'ActivityController@store');
// Update Activity
Route::put('activity', 'ActivityController@store');
// Delete Activity
Route::delete('activity/{id}', 'ActivityController@destroy');

# Label Routes
// List Labels
Route::get('labelnames', 'LabelNameController@index');
//  Activity
Route::get('labelname/{id}', 'LabelNameController@show');
// Create new Activity
Route::post('labelname', 'LabelNameController@store');
// Update Activity
Route::put('labelname', 'LabelNameController@store');
// Delete Activity
Route::delete('labelname/{id}', 'LabelNameController@destroy');