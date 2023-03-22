@extends('admin.app') @section('title') Chi tiết Sản phẩm  @endsection

@section('content')
<script src="{{
    asset('backend/assets/js/jquery-3.2.1.min.js')
}}"></script>
<form
    action="{{ route('admin.product.product-man.update', $data['slug'] ) }}"
    method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
        <div class="row">
            <div class="col-xl-8">
                <div class="accordion mb-3" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#slug" aria-expanded="true" aria-controls="slug">
                                Đường dẫn
                                <span class="pl-2 text-danger">
                                    (Vui lòng không nhập trùng tiêu đề)
                                </span>
                            </button>
                        </h2>
                        <div id="slug" class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <div class="mb-3 mt-3">
                                    <label for="name" class="form-label">Tiêu đề:</label>
                                    <input type="text" class="name form-control" id="name" placeholder="Tiêu đề"
                                        name="name" required value="{{ $data['name'] }}" />
                                </div>

                                <div class="">
                                    <label for="slug" class="form-label">Slug:</label>
                                    <input type="text" class="slug form-control" id="slug" placeholder="Slug"
                                        name="slug" value="{{ $data['slug'] }}" required />
                                </div>
                                <h3></h3>
                            </div>
                        </div>
                    </div>
                </div>

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
                                <div class="mb-3 mt-3">
                                    <label for="desc">Mô tả:</label>
                                    <textarea class="form-control" rows="3" id="desc" name="desc">
                                        {{ $data['desc'] }}
                                    </textarea>
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="content">Nội dung:</label>
                                    <textarea class="form-control" rows="3" id="cke_content" name="content">
                                    {{ $data['content'] }}
                                    </textarea>
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
                                data-bs-target="#danhmucsanpham" aria-expanded="true" aria-controls="danhmucsanpham">
                                Danh mục sản phẩm
                            </button>
                        </h2>
                        <div id="danhmucsanpham" class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="">
                                            <label for="type" class="form-label">Danh mục cấp 1:</label>
                                            <select class="form-select" id="type" name="category_id">
                                                <option value=""> == Chọn danh mục ==</option>
                                                @foreach($splist as $v)
                                                    <option @if ($v['id']==$data['category_id']) selected @endif
                                                        value="{{ $v['id'] }}">
                                                        {{ $v['name'] }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion mb-3" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#anhsanpham" aria-expanded="true" aria-controls="anhsanpham">
                                Hình ảnh sản phẩm
                            </button>
                        </h2>
                        <div id="anhsanpham" class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body text-center">
                                <img class="mb-2" style="width: 200px; height: 200px" src="{{
                                        asset(
                                            'http://localhost:8000/storage/'.$data['photo']
                                        )
                                    }}" alt="{{ $data['name'] }}" />
                                <input type="file" name="photo" />
                            </div>

                            <div class="accordion-body text-center">
                                <img class="mb-2" style="width: 200px; height: 200px" src="{{
                                        asset(
                                            'http://localhost:8000/storage/'.$data['photo1']
                                        )
                                    }}" alt="{{ $data['name'] }}" />
                                <input type="file" name="photo1" />
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion mb-3" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#thongtinsanpham" aria-expanded="true" aria-controls="thongtinsanpham">
                        Thông tin sản phẩm
                    </button>
                </h2>
                <div id="thongtinsanpham" class="accordion-collapse collapse show"
                    aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <div class="mb-3 mt-3">
                            <input type="checkbox" name="status" value="1"
                            @if ($data['status'] == 1) checked  @endif > Hiển thị
                        </div>

                        <div class="mb-3">
                            <div class="d-flex align-items-center">
                                <label class="mb-0 mr-3" for="stt">
                                    STT
                                </label>
                                <input class="text-center" type="number" value="1" id="stt" style="width: 50px"
                                    value={{ $data['numb'] }} />

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-4">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Mã sản phẩm :</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="price" placeholder="Mã sản phẩm"
                                            name="code" value={{ $data['code'] }} />
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Giá cũ :</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="price" placeholder="Giá cũ"
                                            name="regular_price"
                                            value={{ $data['regular_price'] }} />
                                        <span class="input-group-text">VNĐ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Giá mới :</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="price" placeholder="Giá mới"
                                            name="sale_price" value={{ $data['sale_price'] }} />
                                        <span class="input-group-text">VNĐ</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Chiết khấu :</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="price" placeholder="Chiết khấu"
                                            name="discount" value="{{ $data['discount'] }}"
                                            readonly />
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="mb-3">
                                    <label for="stock" class="form-label">Nhập hàng:</label>
                                    <input type="number" class="form-control" id="stock" placeholder="Nhập hàng"
                                        name="stock_input" />
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="mb-3">
                                    <label for="stock" class="form-label">Tồn kho:</label>
                                    <input type="number" class="form-control" id="stock" placeholder="Tồn kho"
                                        name="stock" value=" {{ $data['stock'] }} " readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion mb-3" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#bosutapsanpham" aria-expanded="true" aria-controls="bosutapsanpham">
                        Bộ sưu tập Sản phẩm
                    </button>
                </h2>
                <div id="bosutapsanpham" class="accordion-collapse collapse show"
                    aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <div class="">
                            <input type="file" class="form-control" placeholder="Chọn ảnh" name="image" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Tạo mới</button>
    <button type="reset" class="btn btn-secondary">Làm lại</button>
</form>
@endsection
