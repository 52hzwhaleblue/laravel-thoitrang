<div class="owl-pronb owl-page owl-carousel owl-theme"
     data-xsm-items = "2:10"
     data-sm-items = "2:10"
     data-md-items = "3:10"
     data-lg-items = "3:10"
     data-xlg-items = "4:10"
     data-rewind = "1"
     data-autoplay = "1"
     data-loop = "0"
     data-lazyload = "0"
     data-mousedrag = "1"
     data-touchdrag = "1"
     data-smartspeed = "800"
     data-autoplayspeed = "800"
     data-autoplaytimeout = "5000"
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
                <a href="{{route('cart.add',$v->id)}}" class="add-to-cart d-block">
                Thêm vào giỏ hàng
                </a>
                <a href="" class="buynow d-block">
                    mua ngay
                </a>
            </div>
        </div>
        <div class="pronb-info">
            <h3 class="mb-0">
                <a class="pronb-name text-split" href=chi-tiet-san-pham/{{$v->slug}}/{{$v->id}}>
                    {{$v->name}}
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
</div>
