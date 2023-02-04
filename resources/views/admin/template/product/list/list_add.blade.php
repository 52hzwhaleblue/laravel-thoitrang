@extends('admin.app') @section('title') Chi tiết Sản phẩm cấp 1 @endsection
@section('content')
<form action="{{ route('admin.product.product-list.store') }}" method="POST" enctype="multipart/form-data">
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
                                <div>
                                    <form wire:submit.prevent="storePost">
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">name</label>

                                            <div class="col-md-6">
                                                <input wire:model="name"
                                                       type="text"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="slug" class="col-md-4 col-form-label text-md-right">Slug</label>

                                            <div class="col-md-6">
                                                <input wire:model="slug"
                                                       type="text"
                                                       class="form-control @error('slug') is-invalid @enderror">

                                                @error('slug')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Add
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

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
                                    <input type="checkbox" name="status[]" value="noibat"> Nổi bật
                                    <input type="checkbox" name="status[]" value="hienthi"> Hiển thị
                                </div>
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
                                <input type="file" name="photo" />
                            </div>
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
