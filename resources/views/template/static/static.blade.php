@extends('layouts.client')
@section('content')
<div class="content-main mb-5">
    <?php if(!empty($data)) { ?>
    <div class="title-main"> <span> {{ $data['name'] }} </span></div>
    <div class="static-content">
            {!! $data['content'] !!}
        </div>
    <?php } else { ?>
        <div class="alert alert-warning w-100" role="alert">
            <strong>Không tìm thấy kết quả</strong>
        </div>
    <?php } ?>
    <div class="clear"></div>
</div>
@endsection

