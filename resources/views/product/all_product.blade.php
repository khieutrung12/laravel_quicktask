@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ __('messages.allProduct') }}
            </div>
            <div class="table-responsive">
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
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th class="width-css">
                            </th>
                            <th> {{ __('messages.productName') }}</th>
                            <th> {{ __('messages.productPrice') }}</th>
                            <th> {{ __('messages.productImage') }}</th>
                            <th> {{ __('messages.brand') }}</th>
                            <th class="width-css"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_product as $key => $pro)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <p class="stt">
                                        {{ $pro->product_name }}
                                    </p>
                                </td>
                                <td> {{ $pro->product_price }}</td>
                                <td> <img
                                        src="{{ asset('backend/uploads/images/' . $pro->product_image) }}"
                                        height="100px" width="100px">
                                </td>
                                <td>{{ $pro->brand->brand_name }}</td>
                                <td>
                                    <a href="{{ route('products.edit', ['product' => $pro->id]) }}"
                                        class="active styling-edit"
                                        ui-toggle-class="">
                                        <i
                                            class="fa fa-pencil-square-o text-success text-active"></i></a>
                                    <form
                                        action="{{ route('products.destroy', ['product' => $pro->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-icon"
                                            onclick="return confirm('{{ __('messages.confirmDeleteProduct') }}')">
                                            <i
                                                class="fa fa-times text-danger text"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-5 text-center">
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li><a href=""><i class="fa fa-chevron-left"></i></a>
                            </li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
