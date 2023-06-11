@extends('layouts.client')
@section('content')

    <div id="main">
        <div class="container">
            <div class="group-tabs">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs donhang-ul" role="tablist">
                    <li class="mx-3" role="presentation" class="active"><a class="text-dark h5 active " href="#all" aria-controls="all" role="tab" data-toggle="tab">Tất cả đơn hàng</a></li>
                    <li class="mx-3" role="presentation"><a class="text-dark h5 " href="#confirmed" aria-controls="confirmed" role="tab" data-toggle="tab">Đã xác nhận</a></li>
                    <li class="mx-3" role="presentation"><a class="text-dark h5 " href="#on_delivery" aria-controls="on_delivery" role="tab" data-toggle="tab">Đang vận chuyển</a></li>
                    <li class="mx-3" role="presentation"><a class="text-dark h5 " href="#shipped" aria-controls="shipped" role="tab" data-toggle="tab">Đã giao</a></li>
                    <li class="mx-3" role="presentation"><a class="text-dark h5" href="#cancled" aria-controls="cancled" role="tab" data-toggle="tab">Đã hủy</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="all">
                        @include('template.user.layouts.all')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="confirmed">
                        @include('template.user.layouts.confirmed')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="on_delivery">
                        @include('template.user.layouts.on_delivery')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="shipped">
                        @include('template.user.layouts.shipped')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="cancled">
                        @include('template.user.layouts.canceled')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
