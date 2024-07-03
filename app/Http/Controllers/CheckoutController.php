<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Order;
use App\Models\Orderdetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function showCheckout(){
        $cart = session()->get('cart');
        if (!is_array($cart)) {
            // Nếu không phải mảng, gán cho $cart là một mảng trống
            $cart = [];
        }
        $product_id = array_keys($cart);
        $products = Product::whereIn('id',$product_id)->get();
        return view('checkout', compact('products')); 
    }
    public function checkout(Request $request){
        $cart = session()->get('cart');
        if (!is_array($cart)) {
            $cart = [];
        }
        $product_id = array_keys($cart);
        $products = Product::whereIn('id',$product_id)->get();
        return view('checkout', compact('products')); 
    }
    public function allCheckout(Request $request){

        $token = Str::random(12);
        $cart = session()->get('cart');
        $order = new Order();
        $order->name = $request->lastName. ' ' .$request->firstName;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->email = $request->email;
        $order->payment_method = 'Tiền Mặt';
        $order->buy_date = now();
        $order->token = $token;
        $order->user_id = Auth::id();
        $order->save();
        
        $product_id = array_keys($cart);
        $products = Product::whereIn('id',$product_id)->get();
        // dd($products);
        foreach($products as $item){
        $order_detail = new Orderdetail();
        $order_detail->product_id = $item->id;
        $order_detail->price = $item->price*$cart[$item->id];
        $order_detail->quantity = $cart[$item->id];
        $order_detail->order_id = $order->id;
        $order_detail->save();
        }
        // Thực hiện gửi mail
        $mailInfo =  $order->email;     
        $mail = Mail::to($mailInfo)->send(new OrderMail($order));
        session()->forget('cart');
        return redirect()->route('showCheckout')->with('success','Đơn hàng đã được đặt thành công vui lòng check mail.'); 
    }

    public function confirmOrder($token){
        $order = Order::where('token', $token)->first();
      
        if($order){
            $order->status = 1;
            $order->save();
            return redirect()->route('home')->with('success', 'Bạn đã xác nhận đơn hàng thành công.');
        }
        return abort(404);
    }

    public function thanhtoan_vnpay(Request $request){
        $token = Str::random(12);
        $cart = session()->get('cart');
        $order = new Order();
        $order->name = $request->lastName. ' ' .$request->firstName;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->email = $request->email;
        $order->payment_method = 'Ngân Hàng VNPay';
        $order->buy_date = now();
        $order->token = $token;
        $order->user_id = Auth::id();
        $order->save();
        
        $product_id = array_keys($cart);
        $products = Product::whereIn('id',$product_id)->get();
        // dd($products);
        foreach($products as $item){
        $order_detail = new Orderdetail();
        $order_detail->product_id = $item->id;
        $order_detail->price = $item->price*$cart[$item->id];
        $order_detail->quantity = $cart[$item->id];
        $order_detail->order_id = $order->id;
        $order_detail->save();
        }
        // Thực hiện gửi mail
        $mailInfo =  $order->email;     
        $mail = Mail::to($mailInfo)->send(new OrderMail($order));
       
        
    $vnpay_total = $request->total_vnpay;
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "http://127.0.0.1:8000/thanhtoan_vnpay_success";
    $vnp_TmnCode = "JSR9X3MJ";//Mã website tại VNPAY 
    $vnp_HashSecret = "QJEQATEA92SIY3Z915HU085IMM3HQ11D"; //Chuỗi bí mật
    
    $vnp_TxnRef = $order->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    $vnp_OrderInfo = 'Thanh toán đơn hàng';
    $vnp_OrderType = 'billpayment';
    $vnp_Amount = $vnpay_total *100;
    $vnp_Locale = 'vn';
    $vnp_BankCode = 'NCB';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    //Add Params of 2.0.1 Version
    // $vnp_ExpireDate = $_POST['txtexpire'];
    //Billing

    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
        // "vnp_ExpireDate"=>$vnp_ExpireDate,
    );
    
    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }
    
    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }
    
    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }
    public function thanhtoan_vnpay_success(){
        session()->forget('cart');
        return view('paysuccess');
    }
}
