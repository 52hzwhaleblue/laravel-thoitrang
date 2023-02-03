@extends('admin.app') @section('title') Chi tiết Sản phẩm cấp 2 @endsection
@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="mb-3">
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
                                <label for="slug" class="form-label"
                                    >Slug:</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="slug"
                                    placeholder="Slug"
                                    name="slug"
                                    required
                                />
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
                                    <label for="name" class="form-label"
                                        >Tiêu đề:</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        placeholder="Tiêu đề"
                                        name="name"
                                        required
                                    />
                                </div>

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
                        <div
                            id="danhmucsanpham"
                            class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingOne"
                        >
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="mb-3 mt-3">
                                            <label for="type" class="form-label"
                                                >Danh mục cấp 1:</label
                                            >
                                            <select
                                                class="form-select"
                                                id="type"
                                                name="type"
                                            >
                                                <option value="">cấp 1</option>
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
                                <!-- Dropzone -->
                                <form
                                    action=""
                                    method="post"
                                    enctype="multipart/form-data"
                                    id=""
                                    class=""
                                >
                                    @csrf
                                    <input type="file" />
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
    <button type="submit" class="btn btn-primary">Tạo mới</button>
    <button type="reset" class="btn btn-secondary">Làm lại</button>
</form>
@endsection
