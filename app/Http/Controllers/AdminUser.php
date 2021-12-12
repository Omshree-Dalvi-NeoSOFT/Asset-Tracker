<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
                    return "success";
                }
                else{
                    return back()->with('error', 'Login error');
                }

            }
        }
    }
}
