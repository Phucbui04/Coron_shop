<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Orderdetail;
use function Laravel\Prompts\alert;

class AdminController extends Controller
{
    public function index(){
        $categories = Category::count();
        $products = Product::count();
        $orders = Order::count();
        $total_price = Orderdetail::sum('price');
        return view('admin.index', compact('categories','products','orders','total_price'));
    }
}
