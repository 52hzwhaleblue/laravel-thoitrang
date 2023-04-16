@extends('layouts.client')
@section('content')
<div class="giohang-wrapper">
    <div class="wrap-content">
        <form action="{{route('cart.update')}}" method="POST">
            @csrf
            @method('PATCH')
            <table class="table table-hover table-bordered " id="sampleTable">
                <thead>
                    <tr>
                        <th width="10%">STT</th>
                        <th>Hình</th>
                        <th width="30%">Tiêu đề</th>
                        <th width="30%">Giá</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Tạm tính</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody class="giohang-tbody">
                    @include('template.order.cart_content')
                </tbody>
            </table>


            <div class="giohang-tongtien ">
                <p class="mb-0">Tổng tiền: {{ number_format(Cart::total(),0,',','.') }} vnđ </p>
            </div>
            <div class="giohang-btns ">
                <a href="{{ route('cart.checkout') }}" class="btn btn-primary mr-2"> Thanh toán </a>

                <a class="btn btn-danger" href="{{route('cart.destroy')}}"
                    onclick="alert('Bạn có muốn xóa giỏ hàng không');">Xóa tất cả</a>
            </div>
        </form>
    </div>
</div>
@endsection