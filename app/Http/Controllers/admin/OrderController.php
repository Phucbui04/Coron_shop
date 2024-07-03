<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderdetail;

class OrderController extends Controller
{
    public function order(){
        $orders = Order::orderBy('id','desc')->get();   
        return view('admin.orders', compact('orders'));
    }

    public function orderDetail($id){
        $order = Order::where('id', $id)->with(['user'])->first(); 
        $orderdetail = Orderdetail::with(['product', 'order'])->where('order_id',$id)->get();
        return view('admin.orderdetail', compact('orderdetail', 'order') );
    }
    public function orderDelete($id){
        $order = Order::findOrFail($id);
        if($order->orderDetails->count()>0){
            return redirect()->route('order')->with('error', 'Không thể xóa.');
        }else{
            $order->delete();
            return redirect()->route('order')->with('success', 'Xóa thành công.');
        }
    }
    public function updateStatus(Request $request ,$id){
            $order = Order::find($id);
            $order->status = $request->status;
            $order->save();
        return redirect()->route('order')->with('success', 'Cập nhật trạng thái thành công.');
    }
}
