@extends('layouts.client')
@section('content')
<form method="POST" action="{{ route('cart.store') }}">
    <div class="row">
        <div class="col-md-8 ">
            <h4 class="mb-3">Billing address</h4>
            @csrf
            @auth
            <div class="mb-3">
                <label for="user_id">User ID</label>
                <input type="text" class="form-control" name="user_id" id="user_id" placeholder=""
                    value="{{auth()->user()->id}}" readonly>
            </div>

            <div class="mb-3">
                <label for="order_id">Order ID</label>
                <input type="text" class="form-control" name="order_id" id="order_id" placeholder=""
                    value="{{ auth()->user()->id + Cart::count() + date('h') + date('s') }}" readonly>
            </div>

            @endauth
            <div class="mb-3">
                <label for="fullname">Họ và tên</label>
                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="" value="">
                @error('fullname')
                <small class="text-danger font-weight-bold">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email">Email </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
                @error('email')
                <small class="text-danger font-weight-bold">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="address">Địa chỉ</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St">
                @error('address')
                <small class="text-danger font-weight-bold">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone">Số điện thoại</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="0987764999">
                @error('phone')
                <small class="text-danger font-weight-bold">{{ $message }}</small>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="city">City</label>
                    <select class="custom-select d-block w-100" id="city" name="city">
                        <option value="">Choose...</option>
                        <option>Tp.HCM</option>
                    </select>
                    @error('city')
                    <small class="text-danger font-weight-bold">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="district">District</label>
                    <select class="custom-select d-block w-100" id="district" name="district">
                        <option value="">Choose...</option>
                        <option>Quận Tân Phú</option>
                    </select>
                    @error('district')
                    <small class="text-danger font-weight-bold">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="ward">Ward</label>
                    <select class="custom-select d-block w-100" id="ward" name="ward">
                        <option value="">Choose...</option>
                        <option>Phường Tân Quý</option>
                    </select>
                    @error('ward')
                    <small class="text-danger font-weight-bold">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <hr class="mb-4">
            <h4 class="mb-3">Payment</h4>
            <div class="d-block my-3">
                <div class="custom-control custom-radio">
                    <input id="cod" name="payment_method" type="radio" class="custom-control-input" checked value="COD">
                    <label class="custom-control-label" for="cod">C.O.D</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="momo" name="payment_method" type="radio" class="custom-control-input" value="MOMO">
                    <label class="custom-control-label" for="momo">Thanh toán MOMO</label>
                </div>
            </div>
            <input type="submit" value="Tiến hành thanh toán" class="btn-primary" name="thanhtoan">
        </div>

        <div class="col-md-4 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill"> {{ Cart::count() }} </span>
            </h4>
            <ul class="list-group mb-3 sticky-top">
                @foreach (Cart::content() as $k =>$row)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0"> {{ $row->name }} </h6>
                    </div>
                    <span class="text-muted"> {{ number_format($row->price,0,',','.') }} </span>
                </li>
                <!--Input hidden  -->
                <input type="hidden" name="product_code" value="{{ $row->options->code }}">
                <input type="hidden" name="product_id" value="{{ $row->id }}">
                <input type="hidden" name="product_name" value="{{ $row->name }}">
                <input type="hidden" name="product_quantity" value="{{ $row->qty }}">
                <input type="hidden" name="product_price" value="{{ $row->price }}">
                <input type="hidden" name="product_size" value="{{ $row->options->size }}">
                <input type="hidden" name="product_color" value="{{ $row->options->color }}">
                <input type="hidden" name="product_sale_price" value="{{ $row->options->sale_price }}">
                <input type="hidden" name="product_photo" value="{{ $row->options->photo }}">
                <input type="hidden" name="product_discount" value="{{ $row->options->discount }}">
                <input type="hidden" name="product_subtotal" value="{{ $row->subtotal }}">
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (VNĐ)</span>
                    <strong> {{ number_format(Cart::total(),0,',','.') }} </strong>
                </li>
            </ul>
        </div>
</form>

<form class="card p-2" action="{{ route('cart.ma_giam_gia') }}" method="post">
    @csrf
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Promo code" name="promo_code">
        <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Redeem</button>
        </div>
    </div>
</form>

</div>
@endsection
