@extends('layouts.client')
@section('content')
<form method="POST" action="{{ route('cart.checkPaymentMethod') }}" class="my-5">
    <div class="row justify-content-start position-relative ">
        <div class="col-md-8 ">
            <h4 class="mb-3">Thông tin giao hàng</h4>
            @csrf
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
            <h4 class="mb-3">Hình thức thanh toán</h4>
            <div class="d-block my-3 httt-items">
                <div class="custom-control custom-radio httt-item">
                    <input id="cod" name="payment_method" type="radio" class="custom-control-input" checked value="COD">
                    <img class="lazyload"
                         src="{{ asset('http://localhost:8000/storage/cod.png') }}" alt="momo" />
                    <label class="custom-control-label" for="cod">C.O.D</label>
                </div>
                <div class="custom-control custom-radio httt-item">
                    <input id="momo" name="payment_method" type="radio" class="custom-control-input" value="MOMO">
                    <img class="lazyload"
                         src="{{ asset('http://localhost:8000/storage/momo.png') }}" alt="momo" />
                    <label class="custom-control-label" for="momo">Thanh toán MOMO</label>
                </div>
            </div>

        </div>

        <div class="col-md-4 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Giỏ hàng của bạn</span>
                <span class="badge badge-secondary badge-pill"> {{ Cart::count() }} </span>
            </h4>
            <ul class="list-group mb-3 sticky-topss">
                @foreach (Cart::content() as $k =>$row)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <p class="font-weight-bold">{{ $row->name }}</p>
                    <p class="font-weight-bold"> {{ number_format($row->price) }}  (x{{$row->qty}})</p>
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
                <input type="hidden" class="my-4" name="product_total" value="{{Cart::total()}}">

                <li class="list-group-item d-flex flex-wrap justify-content-between">
                    <strong class="text-danger h5 font-weight-bold ">Total (VNĐ)</strong>
                    <strong class="text-danger h5 font-weight-bold product_total "> {{ number_format(Cart::total()) }} </strong>
                </li>
                <p class="promo_alert"></p>
            </ul>
            <div class="input-group">
                <input type="text" class="form-control promo_code" placeholder="Promo code" name="promo_code">
                <div class="input-group-append">
                    <div  name="magiamgia_submit" class="btn btn-secondary magiamgia_submit">submit</div>
                </div>
            </div>
        </div>
    </div>
        <button class="btn btn-primary" type="submit" > Thanh Toán  </button>
</form>
</div>
@endsection
