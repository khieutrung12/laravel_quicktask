@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    {{ __('messages.addProduct') }}
                </header>
                @if ($errors->any())
                    <div class="alert alert-danger text-center">
                        Vui lòng kiểm tra lại dữ liệu
                    </div>
                @endif
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('products.store') }}"
                            method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @php
                                $mess = Session::get('mess');
                            @endphp
                            @if ($mess)
                                <span
                                    class="text-alert">{{ __('messages.addSuccess', ['name' => __('messages.product')]) }}
                                </span>
                                <br><br>
                                @php
                                    Session::put('mess', null);
                                @endphp
                            @endif
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    {{ __('messages.productName') }}</label>
                                <input type="text" name="product_name"
                                    class="form-control" id="exampleInputEmail1"
                                    placeholder="Tên danh mục"
                                    value="{{ old('product_name') }}">
                                @error('product_name')
                                    <span class="text-alert">
                                        {{ __($message, ['name' => __('messages.productName')]) }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    {{ __('messages.productPrice') }}</label>
                                <input type="text" name="product_price"
                                    class="form-control" id=""
                                    placeholder="Tên danh mục"
                                    value="{{ old('product_price') }}">
                                @error('product_price')
                                    <span class="text-alert">
                                        {{ __($message, ['name' => __('messages.productPrice')]) }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    {{ __('messages.productImage') }}</label>
                                <input type="file" name="product_image"
                                    class="form-control" id="exampleInputEmail1">
                                @error('product_image')
                                    <span class="text-alert">
                                        {{ __($message, ['name' => __('messages.productImage')]) }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">
                                    {{ __('messages.brand') }}</label>
                                <select name="brand_id"
                                    class="form-control input-sm m-bot15">
                                    @foreach ($brand_product as $key => $brand)
                                        <option value="{{ $brand->id }}">
                                            {{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" name="add_product"
                                class="btn btn-info">
                                {{ __('messages.add') }}</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
