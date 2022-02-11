<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Brand\StoreRequest;
use App\Http\Requests\Brand\UpdateRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_brand_product = Brand::orderby('created_at', 'DESC')->get();

        return view('brand.all_brand_product')->with(compact('all_brand_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.add_brand_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $brand_name = $request->brand_name;
        $brand = Brand::create([
            'brand_name' => $brand_name,
        ]);
        $brand->save();
        Session::put('mess', 'Thêm thương hiệu sản phẩm thành công');

        return Redirect::to(route('brands.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_brand_product = Brand::findorfail($id);

        return view('brand.edit_brand_product')->with(compact('edit_brand_product'));
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
        $brand_name = $request->brand_name;
        Brand::where('id', $id)->update(['brand_name' => $brand_name]);
        Session::put('mess', 'Cập nhật thương hiệu sản phẩm thành công');

        return Redirect::to(route('brands.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findorfail($id);
        $brand->delete();
        Session::put('mess', 'Xóa thương hiệu sản phẩm thành công');

        return Redirect::to(route('brands.index'));
    }
}
