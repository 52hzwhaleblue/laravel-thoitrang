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
                                <th>
                                    <div class="custom-control custom-checkbox my-checkbox">
                                        <input type="checkbox" class="checkAll custom-control-input" id="selectall-checkbox">
                                    </div>
                                </th>
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
                            @foreach ($datas as $k =>$v)
                                <tr>
                                    <th>
                                        <div class="custom-control custom-checkbox my-checkbox">
                                            <input type="checkbox" name="list_check[]" value="{{ $v->id }}" class="custom-control-input" id="selectall-checkbox">
                                        </div>
                                    </th>
                                    <th class="align-middle">
                                        <a href="order-detail/{{ $v->id }}/{{ $v->user_id }}">
                                            {{ $v->code }}
                                        </a>
                                    </th>
                                    <th class="align-middle">
                                        <p> {{$v->user->fullname}} </p>
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
                                        <p> Mới đặt </p>
                                    </th>

                                    <th class="align-middle d-flex">
                                        <a href=" " class="btn btn-primary mr-2">
                                            Sửa
                                        </a>

                                        <form action="" method="post">
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
