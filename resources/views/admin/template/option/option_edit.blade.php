@extends('admin.app') @section('title') Chi tiết {{ $type }} @endsection
@section('content')
    @if(session()->has('warning'))
        <div class="alert alert-danger">
            {{ session()->get('warning') }}
        </div>
    @endif
    <form action="{{ route('admin.option.'.$type.'.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="mb-3 sticky-top1">
                <button type="submit" class="btn btn-primary">Tạo mới</button>
                <button type="reset" class="btn btn-secondary">Làm lại</button>
            </div>
            <div class="row">
                <div class="col-xl-8">
                    <div class="accordion mb-3" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#noidungsanpham" aria-expanded="true" aria-controls="noidungsanpham">
                                    Nội dung sản phẩm
                                </button>
                            </h2>
                            <div id="noidungsanpham" class="accordion-collapse collapse show"
                                 aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <div class="d-flex mb-3">
                                        <div class="">
                                            <input type="checkbox" name="status" value="1" checked />
                                            Hiển thị
                                        </div>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Tiêu đề:</label>
                                        <input type="text" class="name form-control" id="name" placeholder="Tiêu đề"
                                               name="name" value="{{$data['name']}}" required />
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="desc">Mô tả:</label>
                                        <textarea class="form-control" rows="3" id="cke_desc" name="desc">
                                        {{ !empty($data['desc'] ) ? $data['desc'] : '' }}
                                        </textarea>
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="content">Nội dung:</label>
                                        <textarea class="form-control" rows="3" id="cke_content" name="content">
                                    {{ !empty($data['content'] ) ? $data['content'] : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="accordion mb-3" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#thuoctinhoption" aria-expanded="true" aria-controls="thuoctinhoption">
                                    Thuộc tính mã giảm giá
                                </button>
                            </h2>
                            <div id="thuoctinhoption" class="accordion-collapse collapse show"
                                 aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <div class="mb-3 mt-3">
                                        <label for="code" class="form-label">Mã giảm giá:</label>
                                        <input type="text" class="code form-control" id="code" placeholder="Mã giảm giá"
                                               name="code" value="{{$data['code']}}" required />
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="order_price_conditions" class="form-label">Điều kiện giảm :</label>
                                        <input type="text" class="order_price_conditions form-control" id="order_price_conditions"
                                               name="order_price_conditions"  value="{{ number_format($data['order_price_conditions']) }}"  required />
                                        <p class="text-danger"> ( Tổng giá trị đơn hàng phải lớn hơn hoặc bằng gia trị này ) </p>
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="discount_price" class="form-label">Giá trị giảm (%):</label>
                                        <input type="text" class="discount_price form-control" id="discount_price"
                                               name="discount_price"  value="{{ $data['discount_price'] }}"  required />
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="product_id" class="form-label">Chọn sản phẩm (nếu có)</label>
                                        <select class="form-select" id="product_id" name="product_id">
                                            <option value="">  Chọn sản phẩm </option>
                                            @foreach ($products as $v)
                                                {{$v->id}}
                                                <option value="{{$v['id']}}" @if($data['product_id'] == $v->id)  selected @endif > {{$v['name']}} | id: {{$v['id']}} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="limit" class="form-label">Số lượng:</label>
                                        <input type="text" class="limit form-control" id="limit" placeholder="Số lượng"
                                               name="limit"  value="{{$data['limit']}}"  required />
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label class="w-50 mb-0" for="end_date">Ngày hết hạn </label>
                                        <input type="datetime"  class="form-control enddate-datetimepicker end_date_flatpickr" name="end_date" id="#end_date" value="{{$data['end_date']}}"  >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
