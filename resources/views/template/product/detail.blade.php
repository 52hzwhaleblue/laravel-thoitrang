@extends('layouts.client')
@section('content')
<div class="grid-pro-detail d-flex flex-wrap justify-content-between align-items-start">
    <div class="left-pro-detail">
        <a id="Zoom-1" class="MagicZoom" data-options="zoomMode: off; hint: off; rightClick: true; selectorTrigger: hover; expandCaption: false; history: false;" href="<?=$product_detail[0]->slug ?>" title="<?= $product_detail[0]->name ?>">
            <img src="{{ asset('backend/assets/img/products/' . $product_detail[0]->photo) }}" />
        </a>
    </div>

    <div class="right-pro-detail">
        <p class="title-pro-detail mb-2"><?= $product_detail[0]->name  ?></p>

        <ul class="attr-pro-detail">
            <li class="w-clear">
                <label class="attr-label-pro-detail">Giá:</label>
                <div class="attr-content-pro-detail">
                    <?php if ($product_detail[0]->sale_price ) { ?>
                        <span class="price-new-pro-detail"><?= $product_detail[0]->sale_price  ?></span>
                        <span class="price-old-pro-detail"><?= $product_detail[0]->regular_price ?></span>
                    <?php } else { ?>
                        <span class="price-new-pro-detail"><?= ($product_detail[0]->regular_price) ? $product_detail[0]->regular_price : 'liên hệ' ?></span>
                    <?php } ?>
                </div>
            </li>
            <?php if (!empty($rowDetail['code'])) { ?>
                <li class="w-clear">
                    <label class="attr-label-pro-detail">Mã sản phẩm:</label>
                    <div class="attr-content-pro-detail"><?= $product_detail[0]->code ?></div>
                </li>
            <?php } ?>
            <li class="w-clear">
                <label class="attr-label-pro-detail">Lượt xem:</label>
                <div class="attr-content-pro-detail"><?= $product_detail[0]->view ?></div>
            </li>
        </ul>
        <div class="desc-pro-detail content-text"><?= $product_detail[0]->desc ?>
        </div>
    </div>
</div>


    <div class="tabs-pro-detail">
        <ul class="nav nav-tabs" id="tabsProDetail" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="info-pro-detail-tab" data-toggle="tab" href="#info-pro-detail" role="tab">Thông tin sản phẩm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="commentfb-pro-detail-tab" data-toggle="tab" href="#commentfb-pro-detail" role="tab">Bình luận</a>
            </li>
        </ul>
        <div class="tab-content pt-4 pb-4" id="tabsProDetailContent">
            <div class="tab-pane fade show active content-text" id="info-pro-detail" role="tabpanel">
                <?= $product_detail[0]->content ?>
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
        </div>
    <?php } ?>
@endsection
