@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật sản phẩm
                </header>
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
                        <form role="form"
                            action="{{ route('products.update', ['product' => $edit_product->id]) }}"
                            method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản
                                    phẩm</label>
                                <input type="text" name="product_name"
                                    class="form-control" id="exampleInputEmail1"
                                    value="{{ $edit_product->product_name }}">
                                @error('product_name')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá sản
                                    phẩm</label>
                                <input type="text"
                                    value="{{ $edit_product->product_price }}"
                                    name="product_price" class="form-control"
                                    id="exampleInputEmail1">
                                @error('product_price')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh sản
                                    phẩm</label>
                                <input type="file" name="product_image"
                                    class="form-control" id="exampleInputEmail1">
                                <img src="{{ asset('backend/uploads/images/' . $edit_product->product_image) }}"
                                    height="100" width="100"
                                    value="{{ $edit_product->product_image }}">
                                @error('product_image')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Thương
                                    hiệu sản phẩm</label>
                                <select name="brand_id"
                                    class="form-control input-sm m-bot15">
                                    @foreach ($brand_product as $key => $brand)
                                        @if ($brand->id == $edit_product->brand_id)
                                            <option selected
                                                value="{{ $brand->id }}">
                                                {{ $brand->brand_name }}
                                            </option>
                                        @else
                                            <option value="{{ $brand->id }}">
                                                {{ $brand->brand_name }}
                                            </option>
                                        @endif
                                    @endforeach

                                </select>
                            </div>
                            <button type="submit" name="add_product"
                                class="btn btn-info">Cập nhật sản
                                phẩm</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
