@extends('layouts.client')
@section('content')
<div class="grid-pro-detail d-flex flex-wrap justify-content-between align-items-start">
    <div class="left-pro-detail">
        @if(!empty($rowDetailPhoto))
            <div class="rowDetailPhoto-for">
                <?php foreach ($rowDetailPhoto as $k => $v) { ?>
                <div class="rowDetailPhoto-img">
                    <img class="w-100" src="{{ asset('http://127.0.0.1:8000/storage/' . $v->photo) }}" />
                </div>
                <?php } ?>
            </div>

            <div class="rowDetailPhoto-scroll">
                <div class="rowDetailPhoto-nav">
                    <?php foreach ($rowDetailPhoto as $k => $v) { ?>
                    <div class="rowDetailPhoto-item">
                        <img class="" src="{{ asset('http://127.0.0.1:8000/storage/' . $v->photo) }}" />
                    </div>
                    <?php } ?>
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


<div class="title-main"><span>Sản phẩm cùng loại</span></div>
<?php if (count($product)) { ?>
<div class="content-main">
    <?php if(!empty($product)) { ?>
    <div class="d-hiden">
        <div class="flex flex-product d-flex flex-wrap align-items-start">
            <?php foreach($product as $k => $v) { ?>
            <div class="product box-product" data-aos="fade-up" data-aos-duration="1000">
                <div class="pic-product">
                    <a class="text-decoration-none  scale-img" href="{{$v->slug}}" title="{{$v->name}}">
                        <img class="lazyload" data-width="430" data-height="575" data-image="{{$v->photo}}"
                            src="{{ asset('http://localhost:8000/storage/'.$v->photo) }}" alt="slide" />
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
</div>
<?php } ?>
@endsection
