@extends('layouts.client')
@section('content')
<div class="content-main mb-5">
    <h1> {{ $rowDetail->name }} </h1>
    <h6> {!! $rowDetail->desc !!} </h6>
    <?php if(!empty($rowDetail)) { ?>
        <div class="static-content">
            {!! $rowDetail->content !!}
        </div>
    <?php } else { ?>
        <div class="alert alert-warning w-100" role="alert">
            <strong>Không tìm thấy kết quả</strong>
        </div>
    <?php } ?>
    <div class="clear"></div>
</div>
@endsection

