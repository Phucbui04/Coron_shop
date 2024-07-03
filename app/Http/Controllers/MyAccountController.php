<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderdetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MyAccountController extends Controller
{
    public function myAccount(){
        $user = Auth::User();
        $orders = Order::orderBy('id','DESC')
        ->where('user_id', $user->id)
        ->with('orderDetails')
        ->get();
        return view('myaccount', compact('orders'));
    }

    public function historyDetail($id){
        $order = Order::with('orderDetails.product')->find($id);
        return view('historydetail', compact('order'));
    }
}
