@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    {{ __('messages.updateProduct') }}
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
                                <label for="exampleInputEmail1">
                                    {{ __('messages.productName') }}
                                </label>
                                <input type="text" name="product_name"
                                    class="form-control" id="exampleInputEmail1"
                                    value="{{ $edit_product->product_name }}">
                                @error('product_name')
                                    <span class="text-alert">
                                        {{ __($message, ['name' => __('messages.productName')]) }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    {{ __('messages.productPrice') }}
                                </label>
                                <input type="text"
                                    value="{{ $edit_product->product_price }}"
                                    name="product_price" class="form-control"
                                    id="exampleInputEmail1">
                                @error('product_price')
                                    <span class="text-alert">
                                        {{ __($message, ['name' => __('messages.productPrice')]) }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    {{ __('messages.productImage') }}
                                </label>
                                <input type="file" name="product_image"
                                    class="form-control" id="exampleInputEmail1">
                                <img src="{{ asset('backend/uploads/images/' . $edit_product->product_image) }}"
                                    height="100" width="100"
                                    value="{{ $edit_product->product_image }}">
                                @error('product_image')
                                    <span class="text-alert">
                                        {{ __($message, ['name' => __('messages.productImage')]) }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">
                                    {{ __('messages.brand') }}
                                </label>
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
                                class="btn btn-info">
                                {{ __('messages.update') }}
                            </button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
