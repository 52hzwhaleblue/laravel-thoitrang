@extends('admin.app') @section('title') Chi tiết {{ $type }} @endsection
@section('content')
@if(session()->has('warning'))
<div class="alert alert-danger">
    {{ session()->get('warning') }}
</div>
@endif

@if(session()->has('warning'))
<div class="alert alert-danger">
    {{ session()->get('warning') }}
</div>
@endif

<form action="{{ route('admin.static.'.$type.'.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="mb-3 sticky-top1">
            <button type="submit" class="btn btn-primary">Lưu</button>
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
                                <div class="mb-3 mt-3">
                                    <label for="name" class="form-label">Tiêu đề:</label>
                                    <input type="text" class="name form-control" id="name" placeholder="Tiêu đề"
                                        name="name" required
                                        value=" {{ !empty($data['name'] ) ? $data['name'] : '' }} " />
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
                                data-bs-target="#anhsanpham" aria-expanded="true" aria-controls="anhsanpham">
                                Hình ảnh {{$type}}
                            </button>
                        </h2>
                        <div id="anhsanpham" class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <form action="" method="post" enctype="multipart/form-data" id="" class="">
                                    @csrf
                                    @if(!empty($data['photo']))
                                    <img class="mb-2" style="width: 200px; height: 200px" src="{{
                                            asset(
                                            'http://localhost:8000/storage/'.$data['photo']
                                        )
                                        }}" alt="{{ $data['name'] }}" />

                                    @endif

                                    <input class="mb-3" type="file" name="photo" />

                                    @if(!empty($data['photo1']))
                                    <img class="mb-2" style="width: 200px; height: 200px" src="{{
                                            asset(
                                            'http://localhost:8000/storage/'.$data['photo1']
                                        )
                                        }}" alt="{{ $data['name'] }}" />

                                    @endif
                                    <input type="file" name="photo1" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection