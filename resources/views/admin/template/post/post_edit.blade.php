@extends('admin.app') @section('title') Chi tiết {{ $type }} @endsection
@section('content')
<script src="{{
    asset('backend/assets/js/jquery-3.2.1.min.js')
}}"></script>
<form action="{{ route('admin.post.'.$type.'.update', $data['slug'] ) }}" method="post" enctype="multipart/form-data">
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
                                        value="{{ $data['name'] }}"
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
                                        value="{{ $data['slug'] }}"
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
                                Nội dung
                            </button>
                        </h2>
                        <div
                            id="noidungsanpham"
                            class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingOne"
                        >
                            <div class="accordion-body">

                                <div class="">
                                    <input type="checkbox" name="status" value="hienthi" @if ($data['status']==1) checked  @endif> Hiển thị
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="name" class="form-label"
                                        >Mô tả:</label
                                    >
                                    <textarea
                                        class="form-control"
                                        rows="3"
                                        id="desc"
                                        name="desc"
                                    >{{$data['desc']}} </textarea>
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
                                data-bs-target="#anhsanpham" aria-expanded="true" aria-controls="anhsanpham">
                                Hình ảnh
                            </button>
                        </h2>
                        <div id="anhsanpham" class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body text-center">
                                <img class="mb-2 w-100"
                                src="{{ asset('http://localhost:8000/storage/' . $data['photo']) }}"
                                    alt="{{ $data['name'] }}" />
                                <input type="file" name="photo" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>
@endsection
