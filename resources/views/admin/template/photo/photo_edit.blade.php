@extends('admin.app') @section('title') Chi tiết {{ $type }} @endsection
@section('content')
<script src="{{
    asset('backend/assets/js/jquery-3.2.1.min.js')
}}"></script>
<form action="{{ route('admin.photo.'.$type.'.update', $data['id'] ) }}" method="post" enctype="multipart/form-data">
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

                                <div class="">
                                    <input type="checkbox" name="status[]" value="noibat" @if (in_array('noibat',$explodeStatus)) checked  @endif > Nổi bật
                                    <input type="checkbox" name="status[]" value="hienthi" @if (in_array('hienthi',$explodeStatus)) checked  @endif> Hiển thị
                                </div>

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
                                        value="{{$data['name']}}"
                                    />
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
                                Hình ảnh sản phẩm
                            </button>
                        </h2>
                        <div id="anhsanpham" class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body text-center">
                                <img class="mb-2" style="width: 200px; height: 200px" src="{{
                                        asset(
                                            'backend/assets/img/products/'.$data['photo']
                                        )
                                    }}" alt="{{ $data['name'] }}" />
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
