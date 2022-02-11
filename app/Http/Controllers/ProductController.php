<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_product = Product::orderby('created_at', 'DESC')->get();

        return view('product.all_product')->with(compact('all_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand_product = Brand::all();

        return view('product.add_product')->with(compact('brand_product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //handle product image
        $newImageName = time() . '-' . rand(0, 119) . '-' .  $request->product_name . '.' . $request->product_image->extension();
        $request->product_image->move(public_path('backend/uploads/images'), $newImageName);

        $product = Product::create([
            'brand_id' => $request->brand_id,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_image' => $newImageName,
        ]);
        $product->save();
        Session::put('mess', 'Thêm thương hiệu sản phẩm thành công');

        return Redirect::to(route('products.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand_product = Brand::all();
        $edit_product = Product::findorfail($id);

        return view('product.edit_product')->with(compact('edit_product', 'brand_product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $product = Product::findorfail($id);
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;

        if ($request->hasfile('product_image')) {
            $destination = 'backend/uploads/images/' . $product->product_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('product_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '-' . rand(0, 119) . '-' .  $request->product_name . '.' . $extension;
            $file->move('backend/uploads/images/', $filename);
            $product->product_image = $filename;
        }
        $product->update();
        Session::put('mess', 'Cập nhật sản phẩm thành công');

        return Redirect::to(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findorfail($id);
        $destination = 'backend/uploads/images/' . $product->product_image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $product->delete();
        Session::put('mess', 'Xóa sản phẩm thành công');

        return Redirect::to(route('products.index'));
    }
}
