<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUser extends Controller
{
    public function Postlogin(Request $req){
        $validatedata=$req->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        if($validatedata){
            $email = $req->username;
            $user = User::where('email', $email)->first();
            if(!$user){
                return back()->with('error', "User doesn't exist");
            }
            else{
                if(Hash::check($req->password,$user->password)){
                    //Session(['uname'=> $user->uname]);
                    $req->session()->put('user',$user);
                    if(!empty($req->rememberme)){
                        setcookie("username",$req->username,time()+3600*24);
                        setcookie("password",$req->password,time()+3600*24);
                      }
                    return redirect('dashboard');
                }
                else{
                    return back()->with('error', 'Login error');
                }

            }
        }
    }

    public function dashBoard(){
        $user = session('user');
        $result=DB::select(DB::raw("SELECT COUNT(*) as total_asset,asset_type_name FROM assets GROUP BY asset_type_name"));
        $chartdata="";
        foreach($result as $list){
            $chartdata.="['".$list->asset_type_name."',   ".$list->total_asset."],";

        }
        $arr['chartData']=rtrim($chartdata,",");
        //return view('admin.chart',$arr);

        $result1=DB::select(DB::raw("SELECT count(*) as activestatus,IsActive FROM assets  GROUP BY IsActive"));
        $chartdata1="";
        foreach($result1 as $list){
            $chartdata1="['".$list->IsActive."',   ".$list->activestatus."],";

        }
        $arr1['chartDataa']=rtrim($chartdata1,",");
        return view('dashboard',compact('user'),$arr,$arr1);
    }

    public function logout(){
        session()->forget('user');
        return view('login');
    }
}
