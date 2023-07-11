@extends('layouts.client')
@section('content')
<div class="grid-pro-detail d-flex flex-wrap justify-content-between align-items-start">
    <div class="left-pro-detail">
        @if(count($rowDetailPhoto))
            <div class="rowDetailPhoto-for">
                <?php foreach ($rowDetailPhoto as $k => $v) { if($v->photo !=null) { ?>
                <div class="rowDetailPhoto-img">
                    <img class="w-100" src="{{ asset('http://127.0.0.1:8000/storage/' . $v->photo) }}" />
                </div>
                <?php }} ?>
            </div>

            <div class="rowDetailPhoto-scroll">
                <div class="rowDetailPhoto-nav">
                    <?php foreach ($rowDetailPhoto as $k => $v) { if($v->photo !=null) {?>
                    <div class="rowDetailPhoto-item">
                        <img class="" src="{{ asset('http://127.0.0.1:8000/storage/' . $v->photo) }}" />
                    </div>
                    <?php } }?>
                </div>
            </div>
        @else
            <img class="lazyload w-100" src="{{ asset('http://localhost:8000/storage/'.$rowDetail[0]->photo ) }}" alt="slide" />
        @endif
    </div>

    <div class="right-pro-detail">
        <p class="title-pro-detail mb-2">
            <?= $rowDetail[0]->name  ?>
        </p>

        <ul class="attr-pro-detail">
            <li class="w-clear">
                <label class="attr-label-pro-detail">Giá: </label>
                <div class="attr-content-pro-detail">
                    <?php if ($rowDetail[0]->sale_price ) { ?>
                    <span class="price-new-pro-detail">
                        <?= number_format($rowDetail[0]->sale_price) ?>đ
                    </span>
                    <span class="price-old-pro-detail">
                        <?= number_format($rowDetail[0]->regular_price) ?>đ
                    </span>
                    <?php } else { ?>
                    <span class="price-new-pro-detail">
                        <?= ($rowDetail[0]->regular_price) ? number_format($rowDetail[0]->regular_price).'đ' : 'liên hệ' ?>
                    </span>
                    <?php } ?>
                </div>
            </li>
            <?php if (!empty($rowDetail['code'])) { ?>
            <li class="w-clear">
                <label class="attr-label-pro-detail">Mã sản phẩm:</label>
                <div class="attr-content-pro-detail">
                    <?= $rowDetail[0]->code ?>
                </div>
            </li>
            <?php } ?>
            <li class="w-clear">
                <label class="attr-label-pro-detail">Lượt xem:</label>
                <div class="attr-content-pro-detail">
                    <?= $rowDetail[0]->view ?>
                </div>
            </li>

{{--            <li>--}}
{{--                <div class="cart-pro-detail d-flex flex-wrap align-items-center justify-content-between">--}}
{{--                    <a class="transition addnow addcart text-decoration-none d-flex align-items-center justify-content-center"--}}
{{--                        data-id="<?=$rowDetail[0]->id ?>" data-action="addnow"><span> Thêm--}}
{{--                            vào giỏ hàng </span></a>--}}
{{--                    <a class="transition buynow addcart text-decoration-none d-flex align-items-center justify-content-center"--}}
{{--                        data-id="<?=$rowDetail[0]->id ?>" data-action="buynow"><span>Mua--}}
{{--                            ngay</span></a>--}}
{{--                </div>--}}
{{--            </li>--}}

        </ul>
        <div class="desc-pro-detail content-text">
            <?= $rowDetail[0]->desc ?>
        </div>
    </div>
</div>


<div class="tabs-pro-detail">
    <ul class="nav nav-tabs" id="tabsProDetail" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="info-pro-detail-tab" data-toggle="tab" href="#info-pro-detail"
                role="tab">Thông tin sản phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="commentfb-pro-detail-tab" data-toggle="tab" href="#commentfb-pro-detail"
                role="tab">Bình luận</a>
        </li>
    </ul>
    <div class="tab-content pt-4 pb-4" id="tabsProDetailContent">
        <div class="tab-pane fade show active content-text" id="info-pro-detail" role="tabpanel">
            <?= $rowDetail[0]->content ?>
        </div>

    </div>
</div>

@if(count($product))
<div class="title-main"><span>Sản phẩm cùng loại</span></div>
<div class="content-main mb-5">
        <?php if(count($product)) { ?>
    <form hidden="" class="form-cart cart-flag" id="cart-form" action="{{route('cart-add')}}" method="post" enctype="multipart/form-data" >
        @csrf
        <input type="text" class="id-input" name="pronb_id" value="" >
        <input type="text" class="color-input" name="pronb_color" value="">
        <input type="text" class="size-input"  name="pronb_size"  value="">
    </form>
    <div class="row mb-5">
        @foreach ($product as $k =>$v)
            @php
                $colors= \App\Models\TableProductDetail::with('product')->where('product_id', $v->id)->where('stock','>','0')->get();
                $sql_sizes = \Illuminate\Support\Facades\DB::table('table_products')->select('properties')->where('id',$v->id)->first();
                ($sql_sizes->properties != null)
                    ? $sizes = json_decode($sql_sizes->properties)->sizes
                    : $sizes = null;

            @endphp
            <div class="pronb-item col-3 mb-4" data-aos="fade-up" data-aos-duration="1500">
                <div class="pronb-image">
                    <a class="pronb-img scale-img" href=/chi-tiet-san-pham/{{$v->slug}}/{{$v->id}} >
                        <img src="{{asset("http://localhost:8000/storage/$v->photo")}}" alt="{{$v->name}}" />
                    </a>
                    <a class="pronb-img1 scale-img" href=/chi-tiet-san-pham/{{$v->slug}}/{{$v->id}} >
                        <img src="{{asset("http://localhost:8000/storage/$v->photo1")}}" alt="{{$v->name}}" />
                    </a>

                    <div class="pronb-btn">
                        <p class="add-to-cart"> Thêm nhanh vào giỏ hàng + </p>
                        <ul class="pronb-sizes">
                            <?php if($sizes != null) { ?>
                            @foreach($sizes as $vsize)
                                <li
                                    onclick="addToCart()"
                                    data-size="{{$vsize}}"
                                    data-product_id="{{$v->id}}"
                                    class="size-click">
                                    <span> {{$vsize}} </span>
                                </li>
                            @endforeach
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="pronb-loader">
                        <div class="loader">
                            <div class="loader-item">
                                <div class="loader-item">
                                    <div class="loader-item">
                                        <div class="loader-item">
                                            <div class="loader-item">
                                                <div class="loader-item" /> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pronb-info">
                @if(count($colors))
                    <ul class="pronb-colors">
                        @foreach($colors as $kcolor => $vcolor)
                            <li  class="pronb-color color-click" data-color="{{$vcolor->color}}">  <p style="background: {{$vcolor->color}};"> </p> </li>
                        @endforeach
                    </ul>
                @endif
                <h3 class="mb-0">
                    <a class="pronb-name" href=/chi-tiet-san-pham/{{$v->slug}}/{{$v->id}}>
                        <span class="text-split">  {{$v->name}} </span>
                    </a>
                </h3>
                <div class="pronb-price">
                        <?php if($v->discount) { ?>
                    <span class="price-new">  {{number_format($v->sale_price)}} vnđ</span>
                    <span class="price-old"> {{number_format($v->regular_price)}} vnđ </span>
                    <span class="discount"> {{$v->discount}} % </span>
                    <?php } else{ ?>
                    <span class="price-new">  {{number_format($v->regular_price)}} vnđ</span>
                    <?php } ?>
                </div>
            </div>
    </div>
    @endforeach
</div>
{!! $product->links() !!}
<?php } else { ?>
<div class="alert alert-warning w-100" role="alert">
    <strong>Không tìm thấy kết quả</strong>
</div>
<?php } ?>
</div>

<script src="{{asset('public/backend/assets/js/jquery-3.2.1.min.js')}}"></script>
<script>
    // Color
    $('.pronb-item').each(function (){
        $(this).find('.color-click:first').addClass('active');
    });

    $('.color-click').click(function (e) {
        $(this).parent('.pronb-colors').find('.color-click').removeClass('active');
        $(this).addClass('active');
    });

    // Size
    // Khi chọn size -> chọn luôn màu active -> add vào giỏ hàng
    $('.size-click').click(function (e) {
        $(this).parents('.pronb-image').find('.pronb-loader').addClass('active');
        let product_id = $(this).data('product_id');
        let size = $(this).data('size');
        let color = $(this).parents('.pronb-item').find('.color-click.active').data('color');

        $(this).parents().find('.cart-flag').find('.id-input').attr('value',product_id);
        $(this).parents().find('.cart-flag').find('.color-input').attr('value',color);
        $(this).parents().find('.cart-flag').find('.size-input').attr('value',size);

        setTimeout(addToCart,3000);
        function addToCart() {
            document.getElementById("cart-form").submit();
        }
    });
</script>
@endif
@endsection
