<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoriesController extends Controller
{
    public function categories()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.categories', compact('categories'));
    }
    public function addCategory(Request $request)
    {
        $category = new Category;
        $category->name = $request->input('name');
        $category->save();
        return redirect('categories');
    }
    public function delCategory($id)
    {
        $delCategory = Category::find($id);
        if ($delCategory->products->count() > 0) {
            return redirect()->route('categories')->with('error', 'Không thể xóa danh mục vì có liên kết khóa ngoại!!!');
        } else {
            $delCategory->delete();
            return redirect()->route('categories')->with('success', 'Danh mục đã được xóa thành công !!!');
        }
    }

    public function showEditForm($id)
    {
        $editCategory = Category::find($id);
        if ($editCategory == null) {
            return redirect('categories')->with('error', 'Không tồn tại ID');
        }
        return view('admin.editCategory', ['item' => $editCategory]);
    }
    public function editCategory(Request $request, $id)
    {
        $editCategory = Category::find($id);
        if (!$editCategory) {
            return redirect('categories');
        } else {
            $editCategory->name = $request->input('name');
            $editCategory->save();
            return redirect('categories');
        }
    }
}
