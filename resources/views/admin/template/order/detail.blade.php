@extends('admin.app')
@section('title')
Quản lý đơn hàng
@endsection

@section('content')
<section class="content">
    <form method="post" action="" enctype="multipart/form-data">
        <div class="card card-primary card-outline text-sm">

            <div class="card-header">

                <h3 class="card-title">Thông tin chính</h3>

            </div>

            <div class="card-body row">

                <div class="form-group col-md-4 col-sm-6">

                    <label>Mã đơn hàng:</label>

                    <p class="text-primary">
                        {{ $rowOrder['code'] }}
                    </p>

                </div>

                <div class="form-group col-md-4 col-sm-6">

                    <label>Hình thức thanh toán:</label>
                    <p class="text-info">
                        <?= $rowOrder['payment_method'] ?>
                    </p>
                </div>

                <div class="form-group col-md-4 col-sm-6">
                    <label>Họ tên:</label>
                    <p class="font-weight-bold text-uppercase text-success">{{ $rowOrder['shipping_fullname'] }} </p>
                </div>

                <div class="form-group col-md-4 col-sm-6">
                    <label>Điện thoại:</label>
                    <p> {{ $rowOrder['shipping_phone'] }} </p>
                </div>

                <div class="form-group col-md-4 col-sm-6">
                    <label>Email:</label>
                    <p> {{ $rowUser['email'] }} </p>
                </div>

                <div class="form-group col-md-4 col-sm-6">
                    <label>Địa chỉ:</label>
                    <p> {{ $rowOrder['shipping_address'] }} </p>
                </div>

                <div class="form-group col-md-4 col-sm-6">
                    <label>Phí vận chuyển:</label>
                    <p class="font-weight-bold text-danger">
                        0 vnđ
                    </p>
                </div>

                <div class="form-group col-md-4 col-sm-6">
                    <label>Ngày đặt:</label>
                    {{-- <p> {{ $rowOrder['created_at'] }} </p> --}}
                </div>

                <div class="form-group col-12">
                    <label for="order_status" class="mr-2">Tình trạng:</label>
                   <p> Mới đặt </p>
                </div>
            </div>
        </div>

        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title">Chi tiết đơn hàng</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="table-responsive">
                            <table
                                class="table table-hover table-bordered"
                                id="sampleTable"
                            >
                                <thead>
                                    <tr>
                                        <th class="align-middle">Hình ảnh</th>
                                        <th class="align-middle" style="width:30%">Tên sản phẩm</th>
                                        <th class="align-middle text-center">Đơn giá</th>
                                        <th class="align-middle text-right">Số lượng</th>
                                        <th class="align-middle text-right">Tạm tính</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $k =>$v)
                                    <tr>
                                        <td class="align-middle">

                                            <a title="{{ $v->name }}">
                                                <img src="" alt="">
                                            </a>

                                        </td>

                                        <td class="align-middle">

                                            <p class="text-primary mb-1">
                                                {{ $v->product->name }}
                                            </p>

                                            <p class="mb-0">
                                                <span class="pr-2">Màu:
                                                    {{ $v->color }}
                                                </span>

                                                <span>Size:
                                                    {{ $v->size }}
                                                </span>
                                            </p>
                                        </td>

                                        <td class="align-middle text-center">

                                            <div class="price-cart-detail">
                                                <span class="price-new-cart-detail mr-3">
                                                    {{ $v->product->sale_price }}
                                                </span>

                                                <span class="price-old-cart-detail">
                                                    {{ $v->product->regular_price }}
                                                </span>
                                            </div>
                                        </td>

                                        <td class="align-middle text-right">
                                            {{ $v->quantity }}
                                        </td>
                                        <td class="align-middle text-right">
                                            {{ $v->quantity *  $v->product->sale_price }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <p> Tổng giá trị đơn hàng: {{ $rowOrder['total_price'] }} </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

</section>
@endsection
