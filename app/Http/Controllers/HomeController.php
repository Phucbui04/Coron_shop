<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $allProducts = Product::allProducts(6)->get();
        return view('home', compact('allProducts'));
    }
}
