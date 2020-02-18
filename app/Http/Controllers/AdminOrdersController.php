<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;

class AdminOrdersController extends Controller
{
    //
    public function index(){
        $orders = DB::table('orders')->get();
        return view ('admin.orders')->with(['orders'=>$orders]);
    }

    public function show($id){
        $orderitems = \App\OrderItem::where('order_id',$id)->get();
        return view('admin.orders_detail',[
            'order_id'=>$id,
            'orderitems'=>$orderitems,
        ]);
    }

    public function save(Request $request ,$id){
        $orders = \App\Order::find($id);
        $orders->update([
            'delivery_status' => 'Shipped',
            'order_status'=>'Paid'
        ]);
        
        // Mail::to('jianyong0426@gmail.com')->send(new \App\Mail\OrderStatus());
        return redirect(route('admin.orders'));
    }
}