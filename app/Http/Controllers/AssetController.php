<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function assetManage(){
        $user = session('user');
        return view('assetmanagement',compact('user'));
    }

    public function addAsset(){
        $user = session('user');
        return view('addasset',compact('user'));
    }
}
