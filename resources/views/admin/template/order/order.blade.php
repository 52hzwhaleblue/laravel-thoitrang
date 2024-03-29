@extends('admin.app') @section('title') Quản lý đơn hàng @endsection
@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

@if(session()->has('warning'))
    <div class="alert alert-danger">
        {{ session()->get('warning') }}
    </div>
@endif

<div class="mb-3">
    <a
        href="{{ route('admin.product.product-man.create') }}"
        class="btn btn-primary mr-2"
        >Tạo mới
    </a>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
                    <table
                        class="table table-hover table-bordered "
                        id="sampleTable"
                    >
                        <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th width="20%">Họ tên</th>
                                <th>Ngày đặt</th>
                                <th>Hình thức thanh toán</th>
                                <th>Tổng tiền</th>
                                <th>Tình trạng</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $k =>$v)
                                <tr>
                                    <th class="align-middle">

                                        <a href="order-detail?order_id={{ $v->id }}&user_id={{ $v->user_id }}">
                                            {{ $v->code }}
                                        </a>

                                    </th>
                                    <th class="align-middle">
                                        <p> {{$v->shipping_fullname}} </p>
                                    </th>
                                    <th class="align-middle">
                                        <p> {{ $v->created_at }} </p>
                                    </th>
                                    <th class="align-middle">
                                        <p> {{ $v->payment_method }} </p>
                                    </th>
                                    <th class="align-middle">
                                        <p> {{ number_format($v->total_price,0,',','.') }} vnđ </p>
                                    </th>
                                    <th class="align-middle">
                                        @foreach ($order_status as $k1 => $v1 )
                                            @if($v->status_id == $v1->id)
                                            <p class="{{ $v1->class_order }}"> {{ $v1->name }} </p>
                                            @endif
                                        @endforeach
                                    </th>

                                    <th class="align-middle d-flex">
                                        <a href="order-detail?order_id={{ $v->id }}&user_id={{ $v->user_id }}" class="btn btn-primary mr-2">
                                            Sửa
                                        </a>

                                        <form action="{{route('admin.order.destroy',$v->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">
                                                Xóa
                                            </button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <form action="{{ route('admin.product.deleteAll') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">
                            Xóa tất cả
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
