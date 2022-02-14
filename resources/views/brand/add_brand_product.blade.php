@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    {{ __('messages.addBrand') }}
                </header>
                @if ($errors->any())
                    <div class="alert alert-danger text-center">
                        {{ __('messages.error') }}
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
                                <span
                                    class="text-alert">{{ __('messages.addSuccess', ['name' => __('messages.brand')]) }}
                                </span>
                                <br><br>
                                @php
                                    Session::put('mess', null);
                                @endphp
                            @endif
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    {{ __('messages.brandName') }}
                                </label>
                                <input type="text" name="brand_name"
                                    class="form-control" id="exampleInputEmail1"
                                    value="{{ old('brand_name') }}"
                                    placeholder="Tên thương hiệu...">
                                @error('brand_name')
                                    <span class="text-alert">
                                        {{ __($message, ['name' => __('messages.brandName')]) }}</span>
                                @enderror
                            </div>
                            <button type="submit" name="add_category_product"
                                class="btn btn-info">
                                {{ __('messages.add') }}</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
