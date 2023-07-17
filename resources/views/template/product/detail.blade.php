@extends('layouts.client')
@section('content')
<div class="grid-pro-detail d-flex flex-wrap justify-content-between align-items-start">
    <div class="left-pro-detail">
        @if(count($rowDetailPhoto))
            <div class="rowDetailPhoto-for">
                <?php foreach ($rowDetailPhoto as $k => $v) { ?>
                    <?php if($v->photo !=null) { ?>
                        <div class="rowDetailPhoto-img">
                            <img  class="w-100" src="{{ asset('http://127.0.0.1:8000/storage/' . $v->photo) }}"
                                  onerror="this.onerror=null; this.src='{{ asset('http://localhost:8000/storage/noimage.jpg') }}'"
                            />
                        </div>
                    <?php } else {?>
                        <img class="lazyload "
                             src="{{ asset('http://localhost:8000/storage/noimage.jpg') }}" alt="noimage" />
                    <?php } ?>
                <?php } ?>
            </div>

            <div class="rowDetailPhoto-scroll">
                <div class="rowDetailPhoto-nav">
                    <?php foreach ($rowDetailPhoto as $k => $v) { if($v->photo !=null) {?>
                    <div class="rowDetailPhoto-item">
                        <img class="" src="{{ asset('http://127.0.0.1:8000/storage/' . $v->photo) }}" onerror="this.onerror=null; this.src='{{ asset('http://localhost:8000/storage/noimage.jpg') }}'" />
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

            <li>
                <div class="cart-pro-detail d-flex flex-wrap align-items-center justify-content-between">
                    <a class="transition addnow addcart text-decoration-none d-flex align-items-center justify-content-center"
                        data-id="<?=$rowDetail[0]->id ?>" data-action="addnow"><span> Thêm
                            vào giỏ hàng </span></a>
                    <a class="transition buynow addcart text-decoration-none d-flex align-items-center justify-content-center"
                        data-id="<?=$rowDetail[0]->id ?>" data-action="buynow"><span>Mua
                            ngay</span></a>
                </div>
            </li>

        </ul>
        <div class="desc-pro-detail content-text">
            <?= $rowDetail[0]->desc ?>
        </div>
    </div>
</div>


@if(count($product))
<div class="title-main"><span>Sản phẩm cùng loại</span></div>
<div class="content-main  cart-flag mb-5">
    <?php if(count($product)) { ?>
    <form  class="form-cart " id="cart-form" action="{{route('cart-add')}}" method="post" enctype="multipart/form-data" >
        @csrf
        <input type="text" class="id-input" name="pronb_id" value="" >
        <input type="text" class="color-input" name="pronb_color" value="">
        <input type="text" class="size-input"  name="pronb_size"  value="">
    </form>
    <div class="row mb-5">
        @foreach ($product as $k =>$v)
            @php
                $thuoctinh= \App\Models\TableProductDetail::where('product_id', $v->id)->where('stock','>','0')->get();
                $sizes = DB::table('table_product_details')->select('size')->where('product_id',$v->id)->get();
                $size_json = array();
                foreach ($sizes as $item) {
                    $size_json[] = $item->size;
                }
                $size_arr = explode(' ',implode(' ',$size_json));

                $colors = array();
                foreach ($thuoctinh as $v1) {
                    $colors[] = $v1->color;
                }
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
                            @foreach($size_arr as $ksize => $vsize)
                                    <?php if($vsize) { ?>
                                <li
                                    onclick="addToCart()"
                                    data-size="{{$vsize}}"
                                    data-product_id="{{$v->id}}"
                                    class="size-click">
                                    <span> {{$vsize}}</span>
                                </li>
                                <?php } ?>
                            @endforeach
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
                        @foreach($colors as $vcolor)
                            <li  class="pronb-color color-click"
                                 data-color="{{$vcolor}}"
                                 data-product_id="{{$v->id}}"
                                 data-sizearr = '<?php echo (\App\Helpers\Functions::getSizeProduct($v->id,$vcolor)) ?>'
                            >

                                <p style="background: {{$vcolor}};"> </p>
                            </li>
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

        let sizearr = $(this).data('sizearr');
        console.log(sizearr);

        let size_class = $(this).parents('.pronb-item').find('.size-click');
        size_class.each(function (){
            let size = $(this).data('size');
            if(!sizearr.includes(size.toString())) $(this).addClass('d-none');
            else $(this).removeClass('d-none');
        });

    });

    $('.color-click').trigger('click');
    // Size
    // Khi chọn size -> chọn luôn màu active -> add vào giỏ hàng
    $('.size-click').click(function (e) {
        $(this).parents('.pronb-image').find('.pronb-loader').addClass('active');
        let product_id = $(this).data('product_id');
        let size = $(this).data('size');
        let color = $(this).parents('.pronb-item').find('.color-click.active').data('color');

        $(this).parents('.cart-flag').find('.id-input').attr('value',product_id);
        $(this).parents('.cart-flag').find('.color-input').attr('value',color);
        $(this).parents('.cart-flag').find('.size-input').attr('value',size);

        setTimeout(addToCart,3000);
        function addToCart() {
            toastr.success('Đã thêm vào giỏ hàng!')
            document.getElementById("cart-form").submit();
        }
    });
</script>
@endif
@endsection
