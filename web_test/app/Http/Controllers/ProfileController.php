<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    public function postProfile(Request $req)
    {
        $new_profile = new Profile;
        $new_profile->first_name = $req->first_name;
        $new_profile->last_name = $req->last_name;
        $new_profile->email = $req->email;
        $new_profile->mobile = $req->mobile;
        $new_profile->save();

        return redirect('profile_list');
        
    }

    public function getProfile(){

        $profile_all = Profile::all();
        //dd($profile_all);
        return view('profile_list',['profile'=>$profile_all]);
    }

    public function delProfile(Request $req){
        Profile::where('id',$req->id)->delete();
        return "ok";
    }

    public function formEdit($id){
        $profile = Profile::where('id',$id)->first();
        return view('edit_profile',['profile'=>$profile]);
    }

    public function updateProfile(Request $req){
        profile::where('id',$req->id)->update(['first_name'=>$req->first_name,
        'last_name'=>$req->last_name,
        'email'=>$req->email,
        'mobile'=>$req->mobile]);
    return redirect()->back();
    }
}
