<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $products = Product::all(); // Hiển thị danh sách tài nguyên 
            return response()->json([
                'status' => 'success',
                'message' => 'Dữ liệu đã được lấy thành công',
                'data' => ProductResource::collection($products),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fall',
                'message' => $e->getMessage(),
                'data' => null,
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validateData = $request->validate([
                'title' => 'required|string|max:255',
                'price' => 'required|numeric',
                'category_id' => 'required|integer|exists:categories,id',
                'image' => 'required|file|mimes:jpeg,png,jpg,svg,gif|max:2048',
                'description' => 'nullable|string',
            ]);
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads'), $imageName);
                $validateData['image'] = $imageName;
            }
            $product = Product::Create([
                'title' => $validateData['title'],
                'image' => $imageName,
                'price' => $validateData['price'],
                'description' => $validateData['description'],
                'category_id' => $validateData['category_id'],
            ]);
            return response()->json([
                'status' => 'Success',
                'message' => 'Thêm thành công',
                'data' => new ProductResource($product),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fall',
                'message' => $e->getMessage(),
                'data' => null,
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $product = Product::findOrFail($id);
            return response()->json([
                'status' => 'Success',
                'message' => 'Lấy dữ liệu thành công',
                'data' => new ProductResource($product),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fall',
                'message' => $e->getMessage(),
                'data' => null,
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validator = $request->validate([
                'title' => 'required|string|max:255',
                'price' => 'required|numeric',
                'category_id' => 'required|integer|exists:categories,id',
                'image' => 'nullable|file|mimes:jpeg,png,jpg,svg,gif|max:2048',
                'description' => 'nullable|string',
                'status' => 'nullable|boolean',
                'detail' => 'nullable|string',
                'sale' => 'nullable|numeric',
            ]);

            $product = Product::findOrFail($id);

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads'), $imageName);

                $validator['image'] = $imageName;
                if ($product->image) {
                    $imgpath = public_path("uploads/{$product->image}");
                    if (file_exists($imgpath)) {
                        unlink($imgpath);
                    }
                }
            } else {
                unset($validator['image']);
            }
            $product->update($validator);
            return response()->json([
                'status' => 'Success',
                'message' => 'Cập nhật thành công',
                'data' => new ProductResource($product),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Fail',
                'message' => $e->getMessage(),
                'data' => null,
            ], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product = Product::findOrFail($id);
            $imgpath = "uploads/" . $product->image;
            $product->delete();

            if (is_file($imgpath)) {
                unlink($imgpath);
            }
            return response()->json([
                'status' => "success",
                'message' => 'Xóa thành công',
                'data' => null,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e->getMessage(),
                'data' => null,
            ], 500);
        }
    }
}
