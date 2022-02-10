@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật thương hiệu sản phẩm
                </header>
                @if ($errors->any())
                    <div class="alert alert-danger text-center">
                        Vui lòng kiểm tra lại dữ liệu
                    </div>
                @endif
                <div class="panel-body">
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
                    <div class="position-center">
                        <form role="form"
                            action="{{ route('brands.update', ['brand' => $edit_brand_product->id]) }}"
                            method="POST">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương
                                    hiệu</label>
                                <input type="text"
                                    value="{{ $edit_brand_product->brand_name }}"
                                    name="brand_name" class="form-control"
                                    id="exampleInputEmail1">
                                @error('brand_name')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" name="update_brand_product"
                                class="btn btn-info">Cập nhật danh
                                mục</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
