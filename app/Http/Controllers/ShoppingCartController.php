<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Auth;

class ShoppingCartController extends Controller
{
    public function addToCart(Request $request,$id) {
        if (auth()->check()) {
            $user_id = auth()->user()->id;
        }
        else {
            $user_id = null;
        }
           
        $product = \App\Product::find($id);
        \App\CartItem::create([
            'session_id' => session()->getId(),
            'user_id' => $user_id,
            'product_id' => $product->id,
            'product_name' => $product->name,
            'description' => $product->description,
            'product_quantity' => $request->input('quantity'),         
            'product_price' =>$product->price,
            'subtotal'=>$product->price * $request->input('quantity')
        ]);
        return redirect(route("showCart"));
    }

    public function show() {
        if (auth()->check()) {
            $user_id = auth()->user()->id;
            $cart_items=\App\CartItem::where('user_id',  $user_id)->get();
        }
        else {
            $cart_items=\App\CartItem::where('session_id',  session()->getId())->get();
        }
            
        if(count($cart_items) <= 0){
            return redirect(route('blank'));
        }else{
            $cart_total = 0;
            foreach ($cart_items as $item) {
                $cart_total += $item->product_price * $item->product_quantity; 
            }
            return view ('cartitem')->with(['cart_items'=>$cart_items, 'cart_total'=>$cart_total]);
        }
            
    }

    public function delete($id){
        if (auth()->check()) {
            $user_id = auth()->user()->id;
            $cart_items=\App\CartItem::where('user_id',  $user_id)->where('id',$id)->get();
        }
        else {
            $cart_items=\App\CartItem::where('session_id',  session()->getId())->where('id',$id)->get();
        }
        foreach ($cart_items as $p) {
            $p->delete();
        }
        return redirect(route('showCart'));
    }

    public function update(Request $request){
        foreach ($request->input('quantity') as $rowid => $value) {
            \App\CartItem::find($rowid)->update(['product_quantity'=>$value]);
        }
        return redirect(route('showCart'));
    }

    public function checkout(){
        if (auth()->check()) {
            $user_id = auth()->user()->id;
            $cart_items=\App\CartItem::where('user_id',  $user_id)->get();
            return view ('checkout')->with(['cart_items'=>$cart_items]);
        }
        else {
            return redirect(route('login'));
        }
    }

}