@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thương hiệu sản phẩm
                </header>
                @if ($errors->any())
                    <div class="alert alert-danger text-center">
                        Vui lòng kiểm tra lại dữ liệu
                    </div>
                @endif
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('brands.store') }}"
                            method="post">
                            {{ csrf_field() }}
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
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    Tên thương hiệu
                                </label>
                                <input type="text" name="brand_name"
                                    class="form-control" id="exampleInputEmail1"
                                    value="{{ old('brand_name') }}"
                                    placeholder="Tên thương hiệu...">
                                @error('brand_name')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" name="add_category_product"
                                class="btn btn-info">Thêm thương hiệu</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
