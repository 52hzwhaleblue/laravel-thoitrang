<?php
	$id = (!empty($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;
	$tempLink = "";
	$where = "";
	$params = array();

	/* Math url */
	if($id)
	{
		$where .= "and id_list = ?";
		array_push($params, $id);
	}

	/* Get data */
	$sql = "select name, slug, slug, id, photo,photo1, regular_price, sale_price, discount, type from #_product where type='san-pham' $where and find_in_set('noibat',status) and find_in_set('hienthi',status) order by numb,id desc";
	$sqlCache = $sql;
    $items = $cache->get($sqlCache, $params, 'result', 7200);

	/* Count all data */
	$countItems = count($cache->get($sql, $params, 'result', 7200));
?>
<?php if($countItems) { ?>
	<div class="owl-sanpham owl-page owl-carousel owl-theme"
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
	    data-navcontainer = ".control-sanpham">
		<?php foreach($items as $k => $v) { ?>
			<div class="box-product" >
				<div class="pic-product">
					<a class="text-decoration-none  " href="<?=$v['slug']?>" title="<?=$v['name']?>">
						<img src='.asset("backend/assets/img/products/$v->photo").' alt="" width="365"
                    height="365" />
					</a>

					<?php if($v['photo1'] != '') { ?>
					<a class="text-decoration-none pic-image2 " href="<?=$v['slug']?>" title="<?=$v['name']?>">
						<?=$func->getImage(['class' => 'd-block','sizes' => '524x735x1', 'isWatermark' => true, 'prefix' => 'product', 'upload' => UPLOAD_PRODUCT_L, 'image' => $v['photo1'], 'alt' => $v['name']])?>
					</a>
					<?php } ?>
				</div>
				<div class="product-info">
					<h3 class="mb-0"><a class="text-decoration-none text-split name-product" href="<?=$v['slug']?>" title="<?=$v['name']?>"><?=$v['name']?></a></h3>
					<div class="price-product">
						<?php if($v['discount']) { ?>
							<span class="price-new">$v['sale_price'])</span>
							<span class="price-old">$v['regular_price'])</span>
							<span class="price-per"><?='-'.$v['discount'].'%'?></span>
						<?php } else { ?>
							<span class="price-new"><?=($v['regular_price']) ? $func->formatMoney($v['regular_price']) : lienhe?></span>
						<?php } ?>
						<div class="wholesale-price-container">
							<?php if($v['wholesale_price']) { ?>
								<p class="wholesale-price">
									<span class="giasi">Giá sỉ: $v['wholesale_price'])</span>
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
    <div class="control-sanpham control-owl transition"></div>

<?php } ?>
