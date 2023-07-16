@extends('layouts.client')
@section('content')
    <div class="content-main cart-flag mb-5">
    <div class="title-main"> <span> SẢN PHẨM </span></div>
    <?php if(count($product)) { ?>
        <form hidden="" class="form-cart " id="cart-form" action="{{route('cart-add')}}" method="post" enctype="multipart/form-data" >
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
                        <a class="pronb-img scale-img" href=chi-tiet-san-pham/{{$v->slug}}/{{$v->id}} >
                            <img src="{{asset("http://localhost:8000/storage/$v->photo")}}" alt="{{$v->name}}" />
                        </a>
                        <a class="pronb-img1 scale-img" href=chi-tiet-san-pham/{{$v->slug}}/{{$v->id}} >
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
                            <a class="pronb-name" href=chi-tiet-san-pham/{{$v->slug}}/{{$v->id}}>
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
@endsection



