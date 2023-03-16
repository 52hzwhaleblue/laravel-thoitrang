@extends('layouts.client')

@section('content')

@if(count($splistnb))
<div class="pronb-wrapper">
    <div class="wrap-content ">
        <div class="title-main mb-0"><span>Sản phẩm nổi bật</span></div>

        <div class="pronb-container">
            <div class="dm-noibat list-hot d-flex flex-wrap align-items-center justify-content-center">
                <?php foreach($splistnb as $v){?>
                    <a class="text-decoration-none" data-id="<?=$v->id?>" data-tenkhongdau="<?=$v->slug?>"><?=$v->name?></a>
                <?php }?>
            </div>


            <div class="load_ajax_product" >

            </div>
        </div>
    </div>
</div>
@endif

@if(count($splistnb))
<div class="splistnb-wrapper">
    <div class="wrap-content">
        <div class="owl-page owl-carousel owl-theme thumbs_img " data-xsm-items="1:0" data-sm-items="2:10"
            data-md-items="3:15" data-lg-items="3:20" data-xlg-items="4:15" data-rewind="1" data-autoplay="1"
            data-loop="0" data-lazyload="0" data-mousedrag="1" data-touchdrag="1" data-smartspeed="800"
            data-autoplayspeed="800" data-autoplaytimeout="5000" data-dots="0" data-animations="" data-nav="1"
            data-navtext="" data-navcontainer="">
            @foreach ($splistnb as $v )
            <div class="splistnb-item">
                <div class="splistnb-img hover_sang3 scale-img">
                    <img class="lazyload" data-width="430" data-height="575" data-image="{{$v->photo}}"
                        src="{{ asset('http://localhost:8000/storage/'.$v->photo) }}" alt="slide" />
                </div>
                <h3 class="splistnb-name">
                    <a class="text-split" href="{{$v->slug}}"> {{$v->name}} </a>
                </h3>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif


@if( !empty($gioithieu_slide) ||!empty($gioithieu))
<div class="gioithieu-wrapper">
    <div class="wrap-content">
        <div class="gioithieu-left">
            <div class="owl-gioithieu owl-page owl-carousel owl-theme" data-xsm-items="1:0"
                data-sm-items="2:10" data-md-items="3:15" data-lg-items="3:20" data-xlg-items="2:15" data-rewind="1"
                data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1" data-touchdrag="1"
                data-smartspeed="800" data-autoplayspeed="800" data-autoplaytimeout="5000" data-dots="0"
                data-animations="" data-nav="1" data-navtext="" data-navcontainer="">
                @foreach ($gioithieu_slide as $v )
                <div>
                    <img
                    data-width="420"
                    data-height="620"
                    class="" src="{{
                            asset(
                                'backend/assets/img/photo/'.$v['photo']
                            )
                        }}" alt="{{ $v['name'] }}" />
                </div>
                @endforeach

            </div>
        </div>
        <div class="gioithieu-right">
            <p class="gioithieu-name">
            </p>
            <p class="gioithieu-name1 text-split">
                dasd
            </p>
            <p class="gioithieu-desc text-split">
                dasdasd
            </p>
            <div class="gioithieu-btn hover_xemthem">
                <a href="gioi-thieu">Xem chi tiết</a>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
