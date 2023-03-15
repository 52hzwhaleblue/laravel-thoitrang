@extends('layouts.client')
@section('content')
<div class="content-main mb-5">
    <div class="title-main"> <span> SẢN PHẨM </span></div>
    <?php if(!empty($product)) { ?>
        <div class="d-hiden">
            <div class="flex flex-product d-flex flex-wrap align-items-start">
                <?php foreach($product as $k => $v) { ?>
                    <div class="product box-product" data-aos="fade-up" data-aos-duration="1000">
                        <div class="pic-product">
                            <a class="text-decoration-none  scale-img" href="{{$v->slug}}" title="{{$v->name}}">
                                <img class="lazyload" data-width="430" data-height="575" data-image="{{$v->photo}}"
                                src="{{ asset('backend/assets/img/products/'.$v->photo) }}" alt="slide" />
                            </a>
                        </div>
                        <div class="product-info">

                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        {!! $product->links() !!}
    <?php } else { ?>
        <div class="alert alert-warning w-100" role="alert">
            <strong>Không tìm thấy kết quả</strong>
        </div>
    <?php } ?>
    <div class="clear"></div>
</div>
@endsection

