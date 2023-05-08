@extends('admin.app') @section('title') Chi tiết Sản phẩm @endsection
@section('content')
@if(session()->has('warning'))
    <div class="alert alert-danger">
        {{ session()->get('warning') }}
    </div>
@endif
<form
action="{{ route('admin.product.product-man.store') }}"
method="POST"
enctype="multipart/form-data"
 >
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
                        <h2
                            class="accordion-header"
                            id="panelsStayOpen-headingOne"
                        >
                            <button
                                class="accordion-button"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#slug"
                                aria-expanded="true"
                                aria-controls="slug"
                            >
                                Đường dẫn
                                <span class="pl-2 text-danger">
                                    (Vui lòng không nhập trùng tiêu đề)
                                </span>
                            </button>
                        </h2>
                        <div
                            id="slug"
                            class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingOne"
                        >
                            <div class="accordion-body">
                                <div class="mb-3 mt-3">
                                    <label for="name" class="form-label"
                                        >Tiêu đề:</label
                                    >
                                    <input
                                        type="text"
                                        class="name form-control"
                                        id="name"
                                        placeholder="Tiêu đề"
                                        name="name"
                                        required
                                    />
                                </div>

                                <div class="">
                                    <label for="slug" class="form-label"
                                        >Slug:</label
                                    >
                                    <input
                                        type="text"
                                        class="slug form-control"
                                        id="slug"
                                        placeholder="Slug"
                                        name="slug"
                                        required
                                    />
                                </div>
                                <h3></h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion mb-3" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2
                            class="accordion-header"
                            id="panelsStayOpen-headingOne"
                        >
                            <button
                                class="accordion-button"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#noidungsanpham"
                                aria-expanded="true"
                                aria-controls="noidungsanpham"
                            >
                                Nội dung sản phẩm
                            </button>
                        </h2>
                        <div
                            id="noidungsanpham"
                            class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingOne"
                        >
                            <div class="accordion-body">
                                <div class="mb-3 mt-3">
                                    <label for="desc">Mô tả:</label>
                                    <textarea
                                        class="form-control"
                                        rows="3"
                                        id="desc"
                                        name="desc"
                                    ></textarea>
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="content">Nội dung:</label>
                                    <textarea
                                        class="form-control"
                                        rows="3"
                                        id="cke_content"
                                        name="content"
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="accordion mb-3" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2
                            class="accordion-header"
                            id="panelsStayOpen-headingOne"
                        >
                            <button
                                class="accordion-button"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#danhmucsanpham"
                                aria-expanded="true"
                                aria-controls="danhmucsanpham"
                            >
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
                                                <option value="">  Chọn danh mục </option>
                                                @foreach ($splist as $v)
                                                    <option value="{{$v['id']}}"> {{$v['name']}} </option>
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
                        <h2
                            class="accordion-header"
                            id="panelsStayOpen-headingOne"
                        >
                            <button
                                class="accordion-button"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#anhsanpham"
                                aria-expanded="true"
                                aria-controls="anhsanpham"
                            >
                                Hình ảnh sản phẩm
                            </button>
                        </h2>
                        <div
                            id="anhsanpham"
                            class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingOne"
                        >
                            <div class="accordion-body">
                                <form
                                    action=""
                                    method="post"
                                    enctype="multipart/form-data"
                                    id=""
                                    class=""
                                >
                                    @csrf
                                    <input type="file" name="photo" />
                                    <input type="file" name="photo1" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion mb-3" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button
                            class="accordion-button"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#thongtinsanpham"
                            aria-expanded="true"
                            aria-controls="thongtinsanpham"
                        >
                            Thông tin sản phẩm
                        </button>
                    </h2>
                    <div id="thongtinsanpham" class="accordion-collapse collapse show"  aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <div class="d-flex mb-3">
                                <div class="mb-3 mt-3">
                                    <input
                                        type="checkbox"
                                        name="status"
                                        value="1"
                                        checked
                                    />
                                    Hiển thị
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex align-items-center">
                                    <label class="mb-0 mr-3" for="stt">
                                        STT
                                    </label>
                                    <input
                                        class="text-center"
                                        type="number"
                                        value="1"
                                        id="stt"
                                        style="width: 50px"
                                    />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="mb-3">
                                        <label for="code" class="form-label"
                                            >Mã sản phẩm :</label
                                        >
                                        <div class="input-group">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="code"
                                                placeholder="Mã sản phẩm"
                                                name="code"
                                            />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="mb-3">
                                        <label for="regular_price" class="form-label"
                                            >Giá cũ :</label
                                        >
                                        <div class="input-group">
                                            <input
                                                type="number"
                                                class="form-control regular_price"
                                                placeholder="Giá cũ"
                                                id="regular_price"
                                                name="regular_price"
                                                value=""
                                            />
                                            <span class="input-group-text"
                                                >VNĐ</span
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="mb-3">
                                        <label for="price" class="form-label"
                                            >Giá mới :</label
                                        >
                                        <div class="input-group">
                                            <input
                                                type="number"
                                                class="form-control sale_price"
                                                id="sale_price"
                                                placeholder="Giá mới"
                                                name="sale_price"
                                                value=""
                                            />
                                            <span class="input-group-text"
                                                >VNĐ</span
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="mb-3">
                                        <label for="price" class="form-label"
                                            >Chiết khấu :</label
                                        >
                                        <div class="input-group">
                                            <input
                                                type="number"
                                                class="form-control discount"
                                                id="price"
                                                placeholder="Chiết khấu"
                                                name="discount"
                                                readonly
                                            />
                                            <span class="input-group-text"
                                                >%</span
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="mb-3">
                                        <label for="stock" class="form-label"
                                            >Nhập hàng:</label
                                        >
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="stock"
                                            placeholder="Nhập hàng"
                                            name="stock_input"
                                        />
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="mb-3">
                                        <label for="stock" class="form-label"
                                            >Tồn kho:</label
                                        >
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="stock"
                                            placeholder="Tồn kho"
                                            name="stock"
                                            readonly
                                        />
                                    </div>
                                </div>
                            </div>
                            {{-- Thêm thuộc tính --}}
                            <div id="themthuoctinh" class="row">
                                <div class="col-md-4 form-group">
                                    <div class="w_box3">
                                        <div id="swatch" class="mt-1">
                                            <label class="d-block" for="color">Color:</label>
                                            <input type="color" id="color" name="color[]" value="#FF0000">
                                        </div>
                                        <div class="d-flex justify-content-between align-item-center mt-1">
                                            <label class="d-block" for="stock">Tồn kho:</label>
                                            <input type="text" name="stock[]" class="form-control w-75" placeholder="Tồn kho" value="" title="Tồn kho">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="button" class="btn btn-primary" onclick="themthuoctinh(); return false;" value="Thêm thuộc tính">
                        </div>
                    </div>
                </div>
                </div>
            </div>

            <div class="accordion mb-3" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button
                            class="accordion-button"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#bosutapsanpham"
                            aria-expanded="true"
                            aria-controls="bosutapsanpham"
                        >
                            Bộ sưu tập Sản phẩm
                        </button>
                    </h2>
                    <div
                        id="bosutapsanpham"
                        class="accordion-collapse collapse show"
                        aria-labelledby="panelsStayOpen-headingOne"
                    >
                        <div class="accordion-body">
                            <div class="">
                                <input
                                    type="file"
                                    class="form-control"
                                    placeholder="Chọn ảnh"
                                    name="image"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
