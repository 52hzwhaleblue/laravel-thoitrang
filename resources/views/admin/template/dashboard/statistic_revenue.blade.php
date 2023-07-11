<section class="content pb-4">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Thống kê doanh thu
{{--                <span class="statistic-month"> <?= date('m') ?> </span>--}}
{{--                <span> / </span>--}}
{{--                <span class="statistic-year"> <?= date('Y') ?> </span>--}}
            </h5>
        </div>
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="col-md-3">
                    <div class="form-group d-flex align-items-center">
                        <label class="w-50 mb-0" for="tungay">Từ ngày </label>
                        <input type="datetime" placeholder="Từ ngày" class="form-control thongke-datetimepicker tungay_flatpickr" name="tungay" id="#tungay" >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group d-flex align-items-center">
                        <label class="w-50 mb-0" for="denngay">Đến ngày </label>
                        <input type="datetime" placeholder="Đến ngày" class="form-control thongke-datetimepicker denngay_flatpickr" name="denngay" id="#denngay">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group"><button id="thongke-larapexchart" class="btn btn-success">Thống Kê</button></div>
                </div>
            </div>
            <div id="revenueFilterByDateChart"></div>

            <div class="row">
                <!-- Chart revenue this months -->
                <div class="col-12">
                    <div class="p-6 m-20 bg-white rounded shadow">
                        {!! $chartRevenueThisMonth->container() !!}
                        <script src="{{ $chartRevenueThisMonth->cdn() }}"></script>

                        {{ $chartRevenueThisMonth->script() }}
                    </div>
                </div>


                <!-- Chart Active-Inactive Users -->
{{--                <div class="col-4">--}}
{{--                    <div class="p-6 m-20 bg-white rounded shadow">--}}
{{--                        {!! $chartActiveInactiveUser->container() !!}--}}
{{--                        <script src="{{ $chartActiveInactiveUser->cdn() }}"></script>--}}

{{--                        {{ $chartActiveInactiveUser->script() }}--}}
{{--                    </div>--}}
{{--                </div>--}}

                <!-- Chart Top 10 products most viewed-->
{{--                <div class="col-4">--}}
{{--                    <div class="p-6 m-20 bg-white rounded shadow">--}}
{{--                        {!! $chartProductMostViewed->container() !!}--}}
{{--                        <script src="{{ $chartProductMostViewed->cdn() }}"></script>--}}

{{--                        {{ $chartProductMostViewed->script() }}--}}
{{--                    </div>--}}
{{--                </div>--}}

                <!-- Thống kế top 10 sản phẩm được xem nhiều nhất -->
                <?php if(count($top10ProductMostViewed)) { ?>
                <div class="col-4">
                    <div class="p-3 m-20 bg-white rounded shadow">
                        <h6 class="text-dark"> Top 10 sản phẩm được xem nhiều nhất </h6>
                        <ul class="">
                            <?php foreach ($top10ProductMostViewed as $k => $v) { ?>
                            <li>
                                <p>
                                    <a href="chi-tiet-san-pham/{{$v->slug}}/{{$v->id}}">
                                        <span style="color: #007D71;"> {{ $v->name }} </span>
                                        <span> {{ $v->name }} </span>
                                        <span> | </span>
                                        <span> {{$v->view}}  </span>
                                    </a>
                                </p>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <?php } ?>

                <!-- Thống kế top 10 sản phẩm bán chạy -->
                <?php if(count($top10ProductBestSeller)) { ?>
                <div class="col-4">
                    <div class="p-3 m-20 bg-white rounded shadow">
                        <h6 class="text-dark"> Top 10 sản phẩm bán chạy </h6>
                        <ul class="">
                            <?php foreach ($top10ProductBestSeller as $k => $v) {
                                $product_name= \App\Models\TableProduct::where('id', $v->product_detail_id)->first();
                            ?>
                                <li>
                                    <p>
                                        <a href="chi-tiet-san-pham/{{$product_name->slug}}/{{$product_name->id}}">
                                            <span style="color: #007D71;"> {{ $product_name->name }} </span>
                                            <span> | </span>
                                            <span> {{$v->total_quantity}}  </span>
                                        </a>
                                    </p>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>


