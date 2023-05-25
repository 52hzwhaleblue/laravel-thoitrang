@extends('layouts.client')
@section('content')
<div class="content-main mb-5">
    <div class="title-main"> <span> SẢN PHẨM </span></div>
    <?php if(count($product)) { ?>
    <form class="form-cart" id="cart-form" action="{{route('cart-add')}}" method="post" enctype="multipart/form-data" hidden="">
        @csrf
        <input type="text" class="id-input" name="pronb_id" value="" >
        <input type="text" class="color-input" name="pronb_color" value="">
        <input type="text" class="size-input"  name="pronb_size"  value="">
    </form>

        <div class="row mb-5">
            <?php foreach($product as $k => $v) { ?>
                <div class="col-3 mb-4">
                    <div class="pronb-item" data-aos="fade-up" data-aos-duration="1500">
                        <div class="pronb-image">
                            <a class="pronb-img scale-img" href=chi-tiet-san-pham/{{$v->slug}}/{{$v->id}} >
                                <img src="{{asset("http://localhost:8000/storage/$v->photo")}}" alt="{{$v->name}}" />
                            </a>
                            <a class="pronb-img1 scale-img" href=chi-tiet-san-pham/{{$v->slug}}/{{$v->id}} >
                                <img src="{{asset("http://localhost:8000/storage/$v->photo1")}}" alt="{{$v->name}}" />
                            </a>

                            <div class="pronb-btn">
                                <p class="add-to-cart"> Thêm nhanh vào giỏ hàng + </p>
{{--                                <ul class="pronb-sizes">--}}
{{--                                    @foreach($sizes_decode as $size)--}}
{{--                                        <li--}}
{{--                                            onclick="addToCart()"--}}
{{--                                            data-size="{{$size}}"--}}
{{--                                            data-product_id="{{$v->id}}"--}}
{{--                                            class="size-click">--}}
{{--                                            <span> {{$size}} </span>--}}
{{--                                        </li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
                            </div>
                            <div class="pronb-loader">
                                <div class="loader">
                                    <div class="loader-item">
                                        <div class="loader-item">
                                            <div class="loader-item">
                                                <div class="loader-item">
                                                    <div class="loader-item">
                                                        <div class="loader-item" /></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pronb-info">
                            @php
                                $colors= \App\Models\TableProductDetail::with('product')->where('product_id', $v->id)->where('stock','>','0')->get();
                            @endphp
                            @if(count($colors))
                                <ul class="pronb-colors">
                                    @foreach($colors as $kcolor => $vcolor)
                                        <li  class="pronb-color color-click" data-color="{{$vcolor->color}}">  <p style="background: {{$vcolor->color}};"> </p> </li>
                                    @endforeach
                                </ul>
                            @endif
                            <h3 class="mb-0">
                                <a class="pronb-name" href=chi-tiet-san-pham/{{$v->slug}}/{{$v->id}}>
                                    <span class="text-split">  {{$v->name}} </span>
                                </a>
                            </h3>
                            <div class="pronb-price">
                                <span class="price-new">  {{number_format($v->sale_price)}} vnđ</span>
                                <span class="price-old"> {{number_format($v->regular_price)}} vnđ </span>
                                <span class="discount"> {{$v->discount}} % </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        {!! $product->links() !!}
    <?php } else { ?>
        <div class="alert alert-warning w-100" role="alert">
            <strong>Không tìm thấy kết quả</strong>
        </div>
    <?php } ?>
</div>
@endsection

