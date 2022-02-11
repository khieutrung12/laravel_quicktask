@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
                </header>
                @if ($errors->any())
                    <div class="alert alert-danger text-center">
                        Vui lòng kiểm tra lại dữ liệu
                    </div>
                @endif
                @php
                    $mess = Session::get('mess');
                @endphp
                @if ($mess)
                    <span class="text-alert">{{ $mess }}
                    </span>
                    <br><br>
                    @php
                        Session::put('mess', null);
                    @endphp
                @endif
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('products.store') }}"
                            method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" name="product_name"
                                    class="form-control" id="exampleInputEmail1"
                                    placeholder="Tên danh mục"
                                    value="{{ old('product_name') }}">
                                @error('product_name')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá sản phẩm</label>
                                <input type="text" name="product_price"
                                    class="form-control" id=""
                                    placeholder="Tên danh mục"
                                    value="{{ old('product_price') }}">
                                @error('product_price')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh sản
                                    phẩm</label>
                                <input type="file" name="product_image"
                                    class="form-control" id="exampleInputEmail1">
                                @error('product_image')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Thương
                                    hiệu</label>
                                <select name="brand_id"
                                    class="form-control input-sm m-bot15">
                                    @foreach ($brand_product as $key => $brand)
                                        <option value="{{ $brand->id }}">
                                            {{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" name="add_product"
                                class="btn btn-info">Thêm sản phẩm</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
