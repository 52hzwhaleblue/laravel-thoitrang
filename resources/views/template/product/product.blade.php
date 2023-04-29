@extends('layouts.client')
@section('content')
<div class="content-main mb-5">
    <div class="title-main"> <span> SẢN PHẨM </span></div>
    <?php if(count($product)) { ?>
        <div class="row mb-5">
            <?php foreach($product as $k => $v) { ?>
                <div class="col-3 mb-4">
                    <div class="pronb-item" data-aos="fade-up" data-aos-duration="1000">
                        <div class="pronb-image">
                            <a class="pronb-img scale-img" href="/{{$v->slug}}/{{ $v->id }}">
                                <img class="lazyload"
                                    src="{{ asset('http://localhost:8000/storage/'.$v->photo) }}" alt="{{$v->name}}" />
                            </a>
                            <a class="pronb-img1 scale-img"  href="/{{$v->slug}}/{{ $v->id }}">
                                <img class="lazyload"
                                    src="{{ asset('http://localhost:8000/storage/'.$v->photo1) }}" alt="{{$v->name}}" />
                            </a>

                            <div class="pronb-btn">
                                <a href='{{ route('cart.add',$v->id) }}' class="add-to-cart d-block">
                                    Thêm vào giỏ hàng
                                </a>
                                <a href="" class="buynow d-block">
                                    mua ngay
                                </a>
                            </div>
                        </div>
                        <div class="pronb-info">
                            <h3 class="mb-0">
                                <a class="pronb-name text-split" >
                                {{ $v->name }}
                                </a>
                            </h3>
                            <div class="pronb-price">
                                <span class="price-new">  {{ number_format($v->sale_price) }} đ   </span>
                                <span class="price-old"> {{ number_format($v->regular_price)}} đ </span>
                                <span class="discount"> {{ $v->discount }} %</span>
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

