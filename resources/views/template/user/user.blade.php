@extends('layouts.client')
@section('content')
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="active"><a class="p-3" data-toggle="tab" href="#all">Tất cả đơn hàng</a></li>
            <li><a class="p-3" data-toggle="tab" href="#confirmed">Đã xác nhận</a></li>
            <li><a class="p-3" data-toggle="tab" href="#on_delivery">Đang vận chuyển</a></li>
            <li><a class="p-3" data-toggle="tab" href="#shipped">Đã giao</a></li>
            <li><a class="p-3" data-toggle="tab" href="#cancled">Đã hủy</a></li>
        </ul>

        <div class="tab-content">
            <div id="all" class="tab-pane fade in active">
                <h3>Tất cả đơn hàng</h3>
                @include('template.user.layouts.all')
            </div>
            <div id="confirmed" class="tab-pane fade">
                <h3>Đã xác nhận</h3>
                @include('template.user.layouts.confirmed')
            </div>
            <div id="on_delivery" class="tab-pane fade">
                <h3>Đang vận chuyển</h3>
                @include('template.user.layouts.on_delivery')
            </div>
            <div id="shipped" class="tab-pane fade">
                <h3>Đã giao</h3>
                @include('template.user.layouts.shipped')
            </div>
            <div id="cancled" class="tab-pane fade">
                <h3>Đã hủy</h3>
                @include('template.user.layouts.canceled')
            </div>
        </div>
    </div>
@endsection
