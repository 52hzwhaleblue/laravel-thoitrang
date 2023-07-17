@extends('layouts.client')
@section('content')
<div class="content-main mb-5">
    <div class="title-main"> <span> TẤT CẢ BÀI VIẾT </span></div>
    <?php if(count($post)) { ?>
        <div class="row mb-5">
            <?php foreach($post as $k => $v) { ?>
                <div class="col-3 mb-4">
                    <div class="tintuc-item">
                        <a class="tintuc-img hover_sang3 scale-img" href="/tin-tuc/{{$v->slug}}">
                            <img class="lazyload"
                                src="{{ asset('http://localhost:8000/storage/'.$v->photo) }}" alt="{{$v->name}}" />
                        </a>
                        <div class="tintuc-info">
                            <h3 class="mb-0">
                                <a href="/tin-tuc/{{$v->slug}}" class="tintuc-name">
                                    <span class="text-split"> {{ $v->name }} </span>
                                </a>
                            </h3>
                            <p class="tintuc-desc text-split"> {{ $v->desc }} </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        {!! $post->links() !!}
    <?php } else { ?>
        <div class="alert alert-warning w-100" role="alert">
            <strong>Không tìm thấy kết quả</strong>
        </div>
    <?php } ?>
</div>
@endsection

