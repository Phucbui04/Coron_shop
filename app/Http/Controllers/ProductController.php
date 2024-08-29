<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;

class ProductController extends Controller
{
    public function products(Request $request){
        $allCategories = Category::allCategories(5)->get();
        if($request->category_id){
            $allProducts = Product::where('category_id', $request->category_id)->orderBy('id', 'DESC')->paginate(9);
        }else{
            $allProducts = Product::allProducts(9)->paginate(9);
        }
       
        return view('products', compact('allProducts','allCategories'));
    }
    public function search(Request $request){
        $allCategories = Category::allCategories(5)->get();

        $kyw = $request->input('query');
            $allProducts = Product::where('title','LIKE',"%$kyw%")->orWhere('description','LIKE', "%$kyw%")->orderBy('id', 'DESC')->paginate(9);

        return view('products', compact('allProducts','allCategories'));
    }
    public function detail($id) {
        // Lấy chi tiết sản phẩm
        $product_one = Product::find($id);
        $comments = Comment::where('product_id', $id)->orderBy('id','DESC')->get();
        // Nếu sản phẩm không tồn tại, trả về trang 404 hoặc thông báo lỗi tùy thuộc vào yêu cầu
        if (!$product_one) {
            abort(404); // Hoặc trả về thông báo lỗi khác tùy theo yêu cầu
        }
        
        // Lấy sản phẩm liên quan
        $splq = Product::where('category_id', $product_one->category_id)
                        ->where('id', '<>', $id)
                        ->take(4)
                        ->get();
        
        // Trả về view với dữ liệu sản phẩm và sản phẩm liên quan
        return view('productdetail', ['product_one' => $product_one, 'splq' => $splq, 'comments'=> $comments]);
    }
    
    
}
