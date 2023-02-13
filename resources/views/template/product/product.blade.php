<div class="content-main">
    <?php if(!empty($product)) { ?>
        <div class="d-hiden">
            <div class="flex-product d-flex flex-wrap align-items-start">
                <?php foreach($product as $k => $v) { ?>
                    <div class="product box-product" data-aos="fade-up" data-aos-duration="1000">
                        <div class="pic-product">
                            <a class="text-decoration-none  scale-img" href="<?=$v[$sluglang]?>" title="<?=$v['name'.$lang]?>">
                                <?=$func->getImage(['class'=>'lazy w-100','sizes' => '524x735x1', 'isWatermark' => true, 'prefix' => 'product', 'upload' => UPLOAD_PRODUCT_L, 'image' => $v['photo'], 'alt' => $v['name'.$lang]])?>
                            </a>
                        </div>
                        <div class="product-info">
                            <h3 class="mb-0"><a class="text-decoration-none text-split name-product" href="<?=$v[$sluglang]?>" title="<?=$v['name'.$lang]?>"><?=$v['name'.$lang]?></a></h3>
                            <div class="price-product">
                                <?php if($v['discount']) { ?>
                                    <span class="price-new"><?=$func->formatMoney($v['sale_price'])?></span>
                                    <span class="price-old"><?=$func->formatMoney($v['regular_price'])?></span>
                                    <span class="price-per"><?='-'.$v['discount'].'%'?></span>
                                <?php } else { ?>
                                    <span class="price-new"><?=($v['regular_price']) ? $func->formatMoney($v['regular_price']) : lienhe?></span>
                                <?php } ?>
                                <div class="wholesale-price-container">
                                    <?php if($v['wholesale_price']) { ?>
                                        <p class="wholesale-price">
                                            <span class="giasi">Giá sỉ: <?=$func->formatMoney($v['wholesale_price'])?> </span>
                                        </p>
                                    <?php } else { ?>
                                        <p class="wholesale-price">
                                            <span class="giasi">Giá sỉ: Liên hệ </span>
                                        </p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } else { ?>
        <div class="alert alert-warning w-100" role="alert">
            <strong>Không tìm thấy kết quả</strong>
        </div>
    <?php } ?>
    <div class="clear"></div>
</div>
