<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductAdminController extends Controller
{
    // Product
    public function productlist(){
        $categories = Category::orderBy('name','ASC')->get();
        $products = Product::orderBy('id', 'DESC')->get();
        return view('admin.productlist', compact('products', 'categories'));
    }
    
    public function addProduct(Request $request){
        $validateData = $request->validate(
            [
                'title'=>'required|string|max:255',
                'price'=>'required|numeric',
                'category_id'=>'required|integer|exists:categories,id',
                'image'=>'required|file|mimes:jpeg,png,jpg,svg,gif|max:2048',
                'description' => 'nullable|string',
            ]);
            if ($request->hasFile('image')) {
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads'), $imageName);
                $validateData['image'] = $imageName;
            }
            try {
                $product = Product::create($validateData);
                return redirect()->route('productlist')->with('success', 'Sản phẩm đã được thêm thành công!');
            } catch (\Exception $e) {
                // \Log::error('Error adding product: ' . $e->getMessage());
                return redirect()->back()->withErrors(['error' => 'Đã xảy ra lỗi khi thêm sản phẩm: ' . $e->getMessage()]);
            }
        }
        public function delProduct($id){
            $delProduct = Product::find($id);
            $imgpath = "uploads/".$delProduct->image;
            if($delProduct->category()->count() > 0){
                return redirect()->route('productlist')->with('error', 'Không thể xóa sản phẩm vì có liên kết khóa ngoại!!!');
            } else {
                $delProduct->delete();
                
                if(is_file($imgpath)){
                    unlink($imgpath);
                }
                return redirect()->route('productlist')->with('success', 'Sản phẩm đã được xóa thành công !!!');
            }
        }

        public function updateProductForm($id){
            $product = Product::find($id);
            $categories = Category::orderBy('name','ASC')->get();
            return view('admin.updateProductForm', compact('product', 'categories'));
        }        

        public function updateProduct(Request $request, $id){
            $validator = $request->validate([
                'title'=>'required|string|max:255',
                'price'=>'required|numeric',
                'category_id'=>'required|integer|exists:categories,id',
                'image'=>'file|mimes:jpeg,png,jpg,svg,gif|max:2048',
                'description' => 'nullable|string',
                'status' => 'nullable|integer',
                'detail' => 'nullable|string',
                'sale' => 'numeric',
            ]);
        
            $product = Product::findOrFail($id);
        
            if ($request->hasFile('image')) {
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads'), $imageName);
                $validator['image'] = $imageName;
                $imgpath="uploads/".$product->image;
                if(file_exists($imgpath)){
                    unlink($imgpath);
                }
            }
        
            $product->update($validator);
        
            return redirect()->route('productlist')->with('success', 'Cập nhật sản phẩm thành công!');
        }
}
