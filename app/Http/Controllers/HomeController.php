<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data= null;
        if(Session::has('CloginId'))
        {
            $data = Client::find(Session::get('CloginId'));
        }
        // dd($data);
        return view('MainPage.Home',compact('data'));
    }
    public function ContactUs()
    {
        
        $data= null;
        if(Session::has('CloginId'))
        {
            $data = Client::find(Session::get('CloginId'));
        }
        return view('MainPage.ContactUs',compact('data'));
    }
    public function Products()
    {
        $data= null;
        if(Session::has('CloginId'))
        {
            $data = Client::find(Session::get('CloginId'));
        }
        $product = Product::all();
        return view('MainPage.Products',compact('data','product'));
    }
    public function About()
    {
        $data= null;
        if(Session::has('CloginId'))
        {
            $data = Client::find(Session::get('CloginId'));
        }
        return view('MainPage.About',compact('data'));
    }
    public function loginPage()
    {
        return view('auth.loginpage');
    }
    
    public function signUp()
    {
        $data = null;
        return view('auth.SignUpPage',compact('data'));
    }

    public function AdminPage()
    {
    
        return view('AdminPanel.AdminHome');
    }
    
    public function Adult_Table(Request $req)
    {

        // dd($req->Date_filter);
        // dd($req->Size);
        // dd($req->Product_Name);

    
            $query = DB::table('products');
        
            if ($req->has('Date_filter')) {
                $query->where('date', $req->Date_filter);
            }
        
            if ($req->has('Size')) {
                $query->where('size', $req->Size);
            }
        
            if ($req->has('Product_Name')) {
                $query->where('name', 'like', '%' . $req->Product_Name . '%');
            }
        
            $products = $query->get();
        
            return view('AdminPanel.Adult-Data',compact('products'));
        
        // {
        //     case 'today':
        //         $query->whereDate('created_at',Carbon::today());
        //         dd($query->toSql());
        //         break;
            
        //     case 'yesterday' :
        //         $query->whereDate('created_at',Carbon::yesterday());
        //         break;
            
        //     case 'ThisWeek' :
        //         $query->whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()]);
        //         break;
            
        //     case 'LastWeek' :
        //             $query->whereBetween('created_at',[Carbon::now()->subWeek(),Carbon::now()]);
        //             break;
            
        //     case 'ThisMonth' :
        //         $query->whereMonth('created_at',Carbon::now()->month());
        //         break;

        //     case 'LastMonth' :
        //             $query->whereMonth('created_at',[Carbon::now()->subMonth()->month]);
        //             break;
                
            
        //     case 'ThisYear' :
        //         $query->whereYear('created_at',Carbon::now()->year());
        //         break;

                   
        //     case 'LastYear' :
        //         $query->whereYear('created_at',Carbon::now()->subYear()->year);
        //         break;
            
        // }
        // $list = $query->get();

        // if($req->Product_Name == "" && empty($req->Size)  )
        // {
        //     $product_list = Product::paginate(10);
        // }
        // elseif($req->Product_Name &&  empty($req->Size) ) 
        // {
        //     $product_list = Product::where([['name','LIKE',"%$req->Product_Name%"]])->paginate(10);
        // }
        // elseif($req->Product_Name && $req->Size ) 
        // {
        //     $product_list = Product::where([['name','LIKE',"%$req->Product_Name%"],['Size',$req->Size]])->paginate(10);
        // }
        // else{
        //     $product_list = Product::paginate(10);
        // }
        // return view('AdminPanel.Adult-Data',compact('product_Search','product_list','list'));
    }
    public function Child_Table()
    {
        $data = Product::all();
        return view('AdminPanel.Child-Data',compact('data'));
    }

    public function AdminTable_Form()
    {

        return view('AdminPanel.Form');
    }
    public function product_detail($id)
    {
        $data = Product::find($id);
        return view('MainPage.ProductDetail',compact('data'));
    }
  
}