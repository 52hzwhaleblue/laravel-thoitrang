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
                        <th>Xóa Ajax</th>
                    </tr>
                </thead>
                <tbody class="giohang-tbody">
                    @include('template.order.cart_content')
                </tbody>
            </table>

            <a href="{{ route('cart.checkout') }}"> Thanh toán </a>
            <a href="{{route('cart.destroy')}}" onclick="alert('Bạn có muốn xóa giỏ hàng không');">Xóa tất cả</a>
            <div class="giohang-tongtien"> Tổng tiền: {{ number_format(Cart::total(),0,',','.') }} vnđ</div>
        </form>
    </div>
</div>
@endsection
