<?php

namespace App\Http\Controllers;

use App\Models\AssetType;
use Illuminate\Http\Request;

class AssetTypeController extends Controller
{
    public function addAssetType(){
        $user = session('user');
        return view('addassettype',compact('user'));
    }

    public function postAddAssetType(Request $req){
        $validateData = $req->validate([
            'assettype'=>'required',
            'assettypedescription'=>'max:500'
        ],[
            'assettype.required' => "Asset type is required !",
            'assettypedescription.max' => "Asset description must be maximum 500 characters. "
        ]);
        if($validateData){
            $type = $req->assettype;
            $description = $req->assettypedescription;
            $addType = new AssetType();
            $addType->asset_type = $type;
            $addType->asset_description = $description;
            if($addType->save()){
                return back()->with('success',"Asset Type Added Successfully !");
            }
            else{
                return back()->with('error',"Asset Type Not Added !");
            }
        }
    }

    public function assetType(){
        $user = session('user');
        $assets=AssetType::paginate(5);
        return view('assetstype',['assets'=>$assets,'user'=>$user]);
    }

    public function deleteAssetsType(Request $req){
        AssetType::where('id',$req->aid)->delete();
        return back();
    } 

    public function editAssetType($id){
        $user = session('user');
        $assettype=AssetType::where('id',$id)->first();
        return view('editassettype',compact('user','assettype'));
    }

    public function postEditAssetType(Request $req){
        $validateData = $req->validate([
            'assettype'=>'required',
            'assettypedescription'=>'max:500'
        ],[
            'assettype.required' => "Asset type is required !",
            'assettypedescription.max' => "Asset description must be maximum 500 characters. "
        ]);
        if($validateData){
            $type = $req->assettype;
            $description = $req->assettypedescription;
            AssetType::where('id',$req->id)->update([
                'asset_type'=>$type,
                'asset_description'=>$description
            ]);
            return back();
        }
    }
}
