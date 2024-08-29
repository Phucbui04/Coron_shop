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
    public function addOrderForm(){
        return view('admin.addOrder');
    }
    public function addOrder(Request $request){
        $validateData = $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'nullable|email',
            'address' => 'required|string',
            'image' => 'required|file|mimes:jpeg,png,jpg,svg,gif|max:2048',
            'price' => 'required|numeric',
            'payment_method' => 'string',
            'buy_date' => 'required|date',
            'status' => 'required|in:0,1,2,3,4',
            'user_id' => 'required|numeric',
        ]);
        
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $validateData['image'] = $imageName;
        }
        
        try {
            $order = Order::create($validateData);
            return redirect()->route('order')->with('success', 'Đơn hàng đã được thêm thành công!');
        } catch (\Exception $e) {
            // Log lỗi nếu cần
            \Log::error('Error adding order: ' . $e->getMessage());
            return redirect()->route('order')->with('error', 'Đã xảy ra lỗi khi thêm đơn hàng!');
        }
    }
    
}
