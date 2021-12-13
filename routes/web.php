<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckStatus;
use App\Http\Controllers\AdminUser;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AssetTypeController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/postlogin',[AdminUser::class,'Postlogin'])->name('PostLogin');

Route::get('/dashboard',[AdminUser::class,'dashBoard'])->name('Dashboard');
Route::get('/manageasset',[AssetController::class,'assetManage'])->name('AssetManage');
Route::get('/addassettype',[AssetTypeController::class,'addAssetType'])->name('addAssetType');
Route::get('/addasset',[AssetController::class,'addAsset'])->name('addAsset');
Route::get('/asset',[AssetController::class,'assets'])->name('Assets');
Route::get('/assettype',[AssetTypeController::class,'assetType'])->name('AssetsType');
Route::get('/editasset/{id}',[AssetController::class,'editAsset'])->name('EditAsset');

Route::post('/postaddassettype',[AssetTypeController::class,'postAddAssetType'])->name('postAddAssetType');
Route::post('/postaddasset',[AssetController::class,'postAddAsset'])->name('postAddAsset');
Route::post('/posteditasset',[AssetController::class,'postEditAsset'])->name('postEditAsset');
Route::patch('/deleteasset',[AssetController::class,'deleteAssets'])->name('DeleteAssets');