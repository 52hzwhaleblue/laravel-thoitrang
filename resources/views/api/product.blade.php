<form class="form-cart" id="cart-form" action="{{route('cart-add')}}" method="post" enctype="multipart/form-data" hidden="">
    @csrf
    <input type="text" class="id-input" name="pronb_id" value="" >
    <input type="text" class="color-input" name="pronb_color" value="">
    <input type="text" class="size-input"  name="pronb_size"  value="">
</form>

<div class="owl-pronb owl-page owl-carousel owl-theme"
     data-xsm-items = "2:10"
     data-sm-items = "2:10"
     data-md-items = "3:10"
     data-lg-items = "3:10"
     data-xlg-items = "4:10"
     data-rewind = "1"
     data-autoplay = "0"
     data-loop = "0"
     data-dotsData="0"
     data-lazyload = "0"
     data-mousedrag = "1"
     data-touchdrag = "1"
     data-smartspeed = "1000"
     data-autoplayspeed = "800"
     data-autoplaytimeout = "8000"
     data-dots = "1"
     data-animations = ""
     data-nav = "1"
     data-navText = ""
     data-navcontainer = ".control-sanpham">
    @foreach ($data as $k =>$v)
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
                <ul class="pronb-sizes">
                    @foreach($sizes_decode as $size)
                        <li
                            onclick="addToCart()"
                            data-size="{{$size}}"
                            data-product_id="{{$v->id}}"
                            class="size-click">
                           <span> {{$size}} </span>
                        </li>
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
                                        <div class="loader-item" />
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
    @endforeach

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

            $(this).parents('.pronb-wrapper').find('.id-input').attr('value',product_id);
            $(this).parents('.pronb-wrapper').find('.color-input').attr('value',color);
            $(this).parents('.pronb-wrapper').find('.size-input').attr('value',size);

            setTimeout(addToCart,3000);
            function addToCart() {
                document.getElementById("cart-form").submit();
            }
        });
    </script>
</div>
