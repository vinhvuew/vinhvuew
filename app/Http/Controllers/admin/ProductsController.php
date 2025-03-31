<?php

namespace App\Http\Controllers\Admin;
// Đúng class cha
use App\Http\Controllers\Admin\Controllers;
use App\Models\categories;
use App\Models\products;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductsController extends Controllers
{
    public function index(Request $request){
        $query = products::with('category');
        if ($request->filled('ma_san_pham')) {
            $query->where('ma_san_pham', 'LIKE', '%' . $request->ma_san_pham . '%');
        }
        // Thực hiện tìm kiếm theo:
        //tên sản phẩm, Danh mục, khoảng giá, ngày nhập, trạng thái

        $query->orderBy('id', 'desc'); // sắp xếp

        $products =$query->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Products::with('category')->findOrFail($id);
        return view('admin.products.show', compact('product'));
    }


    public function create()
    {

        $category = categories::all();
        return view('admin.products.create',compact('category'));
    }

public function store(Request $request)
{
    //lay ra gia tri
    $datanew=[
        'ma_san_pham' => $request->ma_san_pham,
        'ten_san_pham' => $request->ten_san_pham,
        'gia' => $request->gia,
        'gia_khuyen_mai' => $request->gia_khuyen_mai,
        'so_luong' => $request->so_luong,
        'ngay_nhap' => $request->ngay_nhap,
        'mo_ta' => $request->mo_ta,
        'trang_thai' => $request->trang_thai,
        'category_id' => $request->category_id,
        'anh_san_pham' => $request->anh_san_pham,
        'created_at' => now(),
        'updated_at' => now(),
    ];
    // dd($datanew);

    $request->validate([
        'ma_san_pham' => 'required|unique:products,ma_san_pham|max:50',
        'ten_san_pham' => 'required|max:100',
        'gia' => 'required|numeric|min:0',
        'gia_khuyen_mai' => 'nullable|numeric|min:0|lt:gia',
        'so_luong' => 'required|integer|min:1',
        'ngay_nhap' => 'required|date',
        'mo_ta' => 'nullable|string|max:255',

        'category_id' => 'required|exists:categories,id',
        'anh_san_pham' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'ma_san_pham.required' => 'Mã sản phẩm là bắt buộc.',
        'ma_san_pham.unique' => 'Mã sản phẩm đã tồn tại.',
        'ma_san_pham.max' => 'Mã sản phẩm không được vượt quá 50 ký tự.',

        'ten_san_pham.required' => 'Tên sản phẩm là bắt buộc.',
        'ten_san_pham.max' => 'Tên sản phẩm không được vượt quá 100 ký tự.',

        'gia.required' => 'Giá sản phẩm là bắt buộc.',
        'gia.numeric' => 'Giá sản phẩm phải là một số.',
        'gia.min' => 'Giá sản phẩm phải lớn hơn hoặc bằng 0.',

        'gia_khuyen_mai.numeric' => 'Giá khuyến mãi phải là một số.',
        'gia_khuyen_mai.min' => 'Giá khuyến mãi phải lớn hơn hoặc bằng 0.',
        'gia_khuyen_mai.lt' => 'Giá khuyến mãi phải nhỏ hơn giá gốc.',

        'so_luong.required' => 'Số lượng là bắt buộc.',
        'so_luong.integer' => 'Số lượng phải là số nguyên.',
        'so_luong.min' => 'Số lượng phải lớn hơn hoặc bằng 1.',

        'ngay_nhap.required' => 'Ngày nhập là bắt buộc.',
        'ngay_nhap.date' => 'Ngày nhập phải là ngày hợp lệ.',

        'mo_ta.max' => 'Mô tả không được vượt quá 255 ký tự.',



        'category_id.required' => 'Danh mục là bắt buộc.',
        'category_id.exists' => 'Danh mục không tồn tại.',

        'anh_san_pham.image' => 'Ảnh sản phẩm phải là một hình ảnh.',
        'anh_san_pham.mimes' => 'Ảnh sản phẩm phải có định dạng jpeg, png, jpg hoặc gif.',
        'anh_san_pham.max' => 'Ảnh sản phẩm không được vượt quá 2MB.',
    ]);



   // Xử lý hình ảnh
   if ($request->hasFile('anh_san_pham')) {
    $imgPath = $request->file('anh_san_pham')->store('images/products', 'public');
    $datanew['anh_san_pham'] = $imgPath;
}




    products::create($datanew);

    return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được thêm.');
}

public function edit($id)
{
    $category = categories::all();
    $product = Products::findOrFail($id);
    return view('admin.products.edit', compact('product','category'));
}
public function update(Request $request, $id)
{
    $product = products::findOrFail($id);

    $request->validate([
        'ten_san_pham' => 'required',
        'gia' => 'required|numeric',
        'so_luong' => 'required|integer',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = $request->all();

    if ($request->hasFile('image')) {
        // Xóa ảnh cũ nếu có
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $data['image'] = $request->file('image')->store('products', 'public');
    }

    $product->update($data);

    return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được cập nhật.');
}

public function destroy($id)
{
    $product = products::findOrFail($id);

    // Xóa ảnh nếu có
    if ($product->image) {
        Storage::disk('public')->delete($product->image);
    }

    $product->delete();

    return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã bị xóa.');
}

}
//hien thi chi tiet san pham ra giao dien
//xay dung giao dien trang them , sua
