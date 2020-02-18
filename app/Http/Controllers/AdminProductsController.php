<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class AdminProductsController extends Controller
{
   public function index(){
    $products=\App\Product::orderBy('name')->get();
    return view("admin.products")->with(['products'=>$products]);
   }

   public function __construct()
    {
        $this->middleware(function($request, $next) {
            if (!auth()->check() || auth()->user()->isAdmin) {
                redirect()->route('login')->send();
                exit;
            }
            return $next($request);
        });
    }

    // public function store(Request $request){
    //     Validate as required field
    //     $request->validate(
    //         [
    //             'name'=>'required',
    //             'description'=> 'required',
    //             'price'=> 'required'
    //         ]
    //      );

    //      store new records into database
    //     $product = new Products(
    //         [
    //             'name' => $request->get('name'),
    //             'description' => $request->get('description'),
    //             'price' => $request->get('price')
    //         ]
    //     );
    //     $product->name = $request->name;
    //     $product->description = $request->description;
    //     $product->price = $request->price;
    //     $product->save();
    //     return success msg to user
    //     return redirect('/products')->with('success','Product detail saved');
    // }

    public function edit($id){
        if($id==0){ 
            $product=new \App\Product();
            $product->id=0;
        }
        else{
            $product = \App\Product::find($id);
        }
        return view('admin.products_edit')->with(['product'=>$product]);
        
    }

    public function save(Request $request,$id){
        // validate & show error msg
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:100',
            'description' => 'required|max:255',
            'price'=>'required|numeric', 
        ],[
            'name.required'=>"The name field is required",
            'name.max'=>"The name may not exceed 100 characters",
            'description.required'=>"The description field is required",
            'description.max'=>"The description may not exceed 100 characters",
            'price.required'=>"The price field is required",
            'price.numeric'=>"The price may contain number only",
            
        ]);
        $validator->validate();

        if($id==0){ 
            $product= \App\Product::create($request->all());
        }
        else{
            $product = \App\Product::find($id);
            $product->update($request->all());
        }

        if($request->file('photo')){
            $images=[];
            foreach($request->file('photo') as $photo){
                $path = $photo->move('storage/products',$photo->getClientOriginalName());
                array_push($images, $path->getPathName());
            }
            
            $product->update(['image_url'=>$images]);
        }

        return redirect(route('admin.products'));
    }

    public function delete($id){
        $product = \App\Product::find($id);
        $product->delete();

        return redirect(route('admin.products'));
    }


}

?>
