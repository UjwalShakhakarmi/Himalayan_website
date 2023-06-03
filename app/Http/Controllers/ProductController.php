<?php

namespace App\Http\Controllers;

use App\Models\Product;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct(Request $request)
    {
        
        if ($request->hasFile('ProductImg') ) {

            $image = $request->file('ProductImg');
            $imagename = $request->id . $image->getClientOriginalName();
            $imagepath = $image->storeAs('public/img',$imagename);

            $product = new Product;
            $product->ProductImgPath = $imagepath . '/' . $imagename;
            $product->ProductImg = $imagename;
            $product->name = $request->name;
            $product->Category = $request->Category;
            $product->Size = $request->Size;
            $product->Qunatity_Box = $request->Qunatity_Box;
            $product->Qunatity_piece = $request->Qunatity_piece;
            $product->man_date = $request->man_date;
            $product->exp_date = $request->exp_date;
            $product->Desc = $request->Desc;
            $product->save();
        }

        $productType = $request->input('Category');
        if($productType == 'Adult Product'){
            return redirect()->route('Adult_Table');
        } else if($productType == 'Baby Product'){
            return redirect()->route('Child_Table');
        }
        
    }

    public function DeleteProduct($id)
    {
        $Product = Product::find($id);
        $Product->delete(); 
        return redirect()->route('Adult_Table');
    }
    
    public function EditProduct($id){
        $data = Product::find($id);
        return view('AdminPanel.EditProduct',compact('data'));
    }

    public function ProductUpdate(Request $req)
    {
   

            $product = Product::find($req->id);
            $product->name = $req->name;
            $product->Category = $req->Category;
            $product->Size = $req->Size;
            $product->Qunatity_Box = $req->Qunatity_Box;
            $product->Qunatity_piece = $req->Qunatity_piece;
            $product->man_date = $req->man_date;
            $product->exp_date = $req->exp_date;
            $product->Desc = $req->Desc;
            $product->save();
        
        return redirect()->route('Adult_Table');
    }
}
