<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
       $products=\App\Product::orderBy('name') -> get();
       return view("products")->with(['products'=>$products]);
    }
    
    public function show($id){
        
        $product = \App\Product::find($id);
        if($product == null)
        return redirect(route('error'));
        else
        return view("product")->with(['product'=>$product]);
    }

    public function update($id){
        $product = \App\Product::find($id);
        return view("update")->with(['products'=>$product]);
        $id->name = $product->name;
        $id->save();
    }

    public function delete($id){
        $product = \App\Product::find($id);
        $product->delete();
    }

    public function search(Request $request){
        $search = $request->input('search');
        $product = \App\Product::where('name','LIKE','%'.$search.'%')->get();
 
        if(count($product)>0)
            return view("search")->with(['product'=>$product,'search'=>$search]);
        else 
            return view('welcome')->withMessage('No Details found. Try to search again.');
    }
}
?>
