<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetImage;
use App\Models\AssetType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssetController extends Controller
{
    public function assetManage(){
        $user = session('user');
        return view('assetmanagement',compact('user'));
    }

    public function addAsset(){
        $user = session('user');
        $types = AssetType::all();
        return view('addasset',compact('user','types'));
    }

    public function postAddAsset(Request $req){
        $validateData = $req->validate([
            'assetname' => 'required',
            'assettype' => 'required',
            'isactive' => 'required'
        ],[
            'assetname.required' => "Asset Name is required",
            'assettype.required' => "Asset type is required",
            'isactive.required' => "Please choose the status"
        ]);

        if($validateData){
            $assetcode = random_int(100000000000000,9999999999999999);
            $asset = new Asset();
            $asset->asset_name=$req->assetname;
            $asset->asset_code=$assetcode;
            $asset->asset_type=$req->assettype;
            $assettypename=AssetType::where('id',$req->assettype)->first();
            $asset->asset_type_name = $assettypename['asset_type'];
            $asset->IsActive=$req->isactive;
            $asset->save();
            if($files=$req->file('img')){
                $asstype=Asset::latest()->first();
                foreach($files as $file):
                    $ass = new AssetImage();
                    $filename=$file->getClientOriginalName();
                    $ass->imagepath=$filename;
                    //$ass->aid=$asstype->id;
                    $dest=public_path("/assetimages");
                    if($file->move($dest,$filename))
                        {
                            $asstype->images()->save($ass);
                        }
                endforeach;
                
            }
            return back()->with('success',"Details Added !");
        }
    }

    public function assets(){
        $user = session('user');
        $assets=Asset::paginate(5);
        return view('assets',['assets'=>$assets,'user'=>$user]);
    }

    public function assetsImage($id){
        $user = session('user');
        //$img=Asset::find($id)->image();
        $images=AssetImage::all()->where('asset_id',$id);
        //return $images;
        return view('assetimages',['images'=>$images,'user'=>$user]);
    }

    public function deleteAssets(Request $req){
        Asset::where('id',$req->aid)->delete();
        return back();
    }

    public function editAsset($id){
        //return $req->eid;
        $user = session('user');
        $asset=Asset::where('id',$id)->first();
        $selectedtype=AssetType::where('id',$asset->asset_type)->first();
        $types = AssetType::all();
        return view('EditAsset',compact('asset','types','user','selectedtype'));
    }

    public function postEditAsset(Request $req){
        $assetcode = $req->assetcode;
        $assetid=$req->assetid;

        Asset::where('id',$assetid)->update(['asset_name'=>$req->assetname,'asset_code'=>$assetcode,'asset_type'=>$req->assettype,'IsActive'=>$req->isactive]);
        return back()->with('success',"Details Added !");
    }
}
