<section class="content pb-4">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Thống kê doanh thu
                <span class="statistic-month"> <?= date('m') ?> </span>
                <span> / </span>
                <span class="statistic-year"> <?= date('Y') ?> </span>
            </h5>
        </div>
        <div class="card-body">
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
                    <div class="form-group"><button id="thongke-btn" class="btn btn-success">Thống Kê</button></div>
                </div>
            <div id="statistic_revenue" style="height: 250px;"></div>
        </div>
    </div>
</section>

