<?php

namespace App\Http\Controllers;

use App\Models\Client ;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;


class ClientController extends Controller
{
    public function RegisterClient(Request $req)
    {
        Client::Create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password)
        ]);
       
        return back()->with('Success','You are successfully registered.');

    }
    public function login(Request $req)
    {
     

        $client = Client::where('email','=',$req->email)->first();
        $admin = Admin::where('email', '=', $req->email)->first();

        if($client){
            if(Auth::attempt($req->only('email','password'))){
                session()->put('CloginId',$client->id);
                return redirect()-> route('home');
            }else {
                return back()->with('Fail','Password not Matched');
            }
        }
        if(empty($admin)){
            $admin = new Admin();
            $admin->email = "Ujwal@gmail.com";
            $admin->password = Hash::make('ujwal');
            $admin->save();
        }elseif($admin)
        {
            if(Auth::attempt($req->only('email','password'))){
            
                return redirect()->route('Admin_Dashboard');
            }
        }
        
        else{
            return back()->with('Fail','Unable to SignUp');
        }
        
    }
    public function ProfileLogo(Request $req){

        $image = $req->file('pp');
        $ppname = $req->id.$image->getClientOriginalName();
        $pppath = $image->storeAs('public/img/ProfilePic',$ppname);
        $Savepp = Client::find($req->id);
        $Savepp->ProfileImg = $ppname;
        $Savepp->ProfileImgPath = $pppath;
        //delete old one
        $thisone = Client::find($req->id);
        $oldpath = $thisone->ProfileImgPath;
        if ($oldpath === 'public/default/default.png') {
            $Savepp->save();
        } elseif ($Savepp == $oldpath) {
            $Savepp->save();
        } else {
            Storage::disk('local')->delete($oldpath);
            $Savepp->save();
        }
    }
    public function logout()
    {
        
        Auth::logout();
        
        return redirect()->route('home');
    }
    

}
