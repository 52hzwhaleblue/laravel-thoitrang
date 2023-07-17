@extends('admin.app')
@section('title')
Quản lý chi tiết đơn hàng
@endsection

@section('content')
<section class="content">
    <form
        action="order-detail/update?order_id={{ $rowOrder->id }}&user_id={{ $rowUser->id }}"
        method="post"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>

        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title">Thông tin chính</h3>
            </div>

            <div class="card-body row">
                <div class="form-group col-md-4 col-sm-6">
                    <label class="font-weight-bold">Họ tên:</label>
                    <p class="font-weight-bold text-uppercase text-success">{{ $rowOrder->shipping_fullname }} </p>
                </div>

                <div class="form-group col-md-4 col-sm-6">
                    <label class="font-weight-bold">Điện thoại:</label>
                    <p> {{ $rowOrder->shipping_phone }} </p>
                </div>

                <div class="form-group col-md-4 col-sm-6">
                    <label class="font-weight-bold">Email:</label>
                    <p> {{ $rowUser->email }} </p>
                </div>

                <div class="form-group col-md-4 col-sm-6">
                    <label class="font-weight-bold">Địa chỉ:</label>
                    <p> {{ $rowOrder->shipping_address }} </p>
                </div>

                <div class="form-group col-md-4 col-sm-6">
                    <label class="font-weight-bold">Mã đơn hàng:</label>
                    <p class="text-primary">
                        {{ $rowOrder->code }}
                    </p>
                </div>

                <div class="form-group col-md-4 col-sm-6">
                    <label class="font-weight-bold">Hình thức thanh toán:</label>
                    <p class="text-info">
                        {{ $rowOrder->payment_method }}
                    </p>
                </div>

                <div class="form-group col-md-4 col-sm-6">
                    <label class="font-weight-bold">Phí vận chuyển:</label>
                    <p class="font-weight-bold text-danger">
                        Không
                    </p>
                </div>

                <div class="form-group col-md-4 col-sm-6">
                    <label class="font-weight-bold">Ngày đặt:</label>
                    <p> {{ $rowOrder->created_at }} </p>
                </div>

                <div class="form-group col-3">
                    <label for="order_status" class="mr-2 font-weight-bold">Tình trạng:</label>
                    <select name="order_status" id="" class="form-select" aria-label="Default select example">
                        <option value="0"> Chọn tình trạng </option>
                        @foreach ($order_status as $k => $v )
                            <option value="{{ $v->id }}" @if($rowOrder->status_id == $v->id) selected  @endif > {{ $v->name }} </option>
                        @endforeach
                   </select>
                </div>
            </div>
        </div>

        <h4> Chi tiết đơn hàng</h4>

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
                                        <th class="align-middle text-center">Hình ảnh</th>
                                        <th class="align-middle text-center" style="width:30%">Tên sản phẩm</th>
                                        <th class="align-middle text-center">Đơn giá</th>
                                        <th class="align-middle text-right">Số lượng</th>
                                        <th class="align-middle text-right">Tạm tính</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order_details as $k =>$v)
{{--                                        <?php dd($order_details)  ?>--}}
                                    <tr>
                                        <td class="align-middle">

                                            <a title="{{ $v->product->name }}" class="text-center d-block">
                                                <img
                                                style="width: 60px; height: 60px"
                                                src="{{
                                                    asset(
                                                        'http://localhost:8000/storage/'.$v->product->photo
                                                    )
                                                }}"
                                                alt="{{ $v->product->name }}"
                                            />
                                            </a>

                                        </td>

                                        <td class="align-middle">
                                            <p class="text-primary mb-1">
                                                {{ $v->product->name }}
                                            </p>

                                            <p class="mb-0">
                                                <span class="pr-2">Màu:
                                                    <input class="" style="width: 5%; border: 0; border-radius: 20px;overflow: hidden;" type="color" name="color[]" value="{{ $v->color }}">
                                                    <input type="hidden" name="color[]" value="{{ $v->color }}">
                                                    <input type="hidden" name="product_id[]" value="{{ $v->product->id }}">
                                                </span>
                                                <span>Size:{{ $v->size }} </span>
                                            </p>
                                        </td>

                                        <td class="align-middle text-center">
                                            <div class="price-cart-detail">
                                                <?php if($v->product->discount) { ?>
                                                    <span class="price-new">  {{number_format($v->product->sale_price)}} vnđ</span>
                                                <?php } else{ ?>
                                                    <span class="price-new">  {{number_format($v->product->regular_price)}} vnđ</span>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td class="align-middle text-right">
                                            {{ $v->quantity }}
                                        </td>
                                        <td class="align-middle text-right">
                                            <p class="price-new font-weight-bold">
                                                <?php
                                                    ($v->product->discount)
                                                        ? $total_price = number_format($v->quantity *  $v->product->sale_price,0,',','.')
                                                        : $total_price = number_format($v->quantity *  $v->product->regular_price,0,',','.');
                                                    ($discount_price)
                                                        ? $total_price_after_discount = $total_price - ($total_price*$discount_price/100)
                                                        : $total_price_after_discount = $total_price;
                                                    ?>

                                                <span class="price-new">{{$total_price}} vnđ</span>
                                            </p>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <?php if(($rowOrder->promotion_id)) { ?>
                            <div class="d-flex justify-content-end align-items-center text-right mt-3">
                                <p class="mr-3 mb-0 text-dark font-weight-bold">Phần Trăm Giảm Giá (%):</p>
                                <p class=" mb-0 text-right text-danger font-weight-bold">{{$discount_price}}</p>
                            </div>

                            <div class="d-flex justify-content-end align-items-center text-right mt-3">
                                <p class="mr-3 mb-0 text-dark font-weight-bold">Tiền giảm:</p>
                                <p class=" mb-0 text-right text-danger font-weight-bold">- {{$total_price*$discount_price/100}}</p>
                            </div>

                            <?php } ?>
                            <div class="d-flex justify-content-end align-items-center text-right mt-3">
                                <p class="mr-3 mb-0 text-dark font-weight-bold">Tổng giá trị đơn hàng: </p>
                                <p class="mb-0 text-right text-danger font-weight-bold">{{ number_format($rowOrder->total_price,0,',','.')  }} vnđ</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

</section>
@endsection
