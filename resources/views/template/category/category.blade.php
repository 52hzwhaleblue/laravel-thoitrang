@extends('layouts.client')
@section('content')
<div class="content-main mb-5">
    <div class="title-main"> <span> DANH MỤC SẢN PHẨM </span></div>
    <?php if(count($category)) { ?>
    <div class="splistnb-items">
        @foreach ($category as $v )
            <div class="splistnb-item">
                <a class="splistnb-img hover_sang3 scale-img" href="{{$v->slug}}">
                    <img class="lazyload"
                         src="{{ asset('http://localhost:8000/storage/'.$v->photo) }}" alt="slide" />
                </a>
                <h3 class="splistnb-name">
                    <a class="text-split" href="{{$v->slug}}"> {{$v->name}} </a>
                </h3>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {!! $category->links() !!}

    </div>
    <?php } else { ?>
        <div class="alert alert-warning w-100" role="alert">
            <strong>Không tìm thấy kết quả</strong>
        </div>
    <?php } ?>
</div>
@endsection

