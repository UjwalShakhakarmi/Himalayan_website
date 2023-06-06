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
            'role' => 'client',
            'password' => Hash::make($req->password)
        ]);
       
        return back()->with('Success','You are successfully registered.');

    }
    public function login(Request $req)
    {
        $alluser = Client::where('email','=',$req->email)->first();
        
        if($alluser)
        {

    
        if($alluser->role == 'admin'){
            if(empty($alluser->password))
            {
                $alluser->password = Hash::make('root123');
                $alluser->save();
            }
           
            if(Hash::check($req->password,$alluser->password)){
                session()->put('AloginId',$alluser->id);
                return redirect()->route('Admin_Dashboard');
            }else {
                return back()->with('Fail','Password not Matched');
            }
        }
        elseif($alluser->role == 'client'){
           if(Hash::check($req->password,$alluser->password))
           {
                session()->put('CloginId',$alluser->id);
                return redirect()->route('home');
           }else{
                return back()->with('Fail','Unable to SignUp');

           }
        }
    }else{
        return back()->with('fail','Email is not registered');
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
