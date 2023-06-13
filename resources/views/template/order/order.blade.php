@extends('layouts.client')
@section('content')
<div class="giohang-wrapper">
    <div class="wrap-content">
        <form action="{{route('cart.update')}}" method="POST">
            @csrf
            @method('PATCH')
            <table class="table table-hover table-bordered " id="sampleTable">
                <thead>
                    <tr>
                        <th >STT</th>
                        <th width="10%">Hình</th>
                        <th width="30%">Tiêu đề</th>
                        <th width="20%">Đơn giá</th>
                        <th width="7%">Số lượng</th>
                        <th width="20%">Tạm tính</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody class="giohang-tbody">
                    @if(Cart::count() > 0)
                    @php
                        $count = 0;
                    @endphp
                    @foreach (Cart::content() as $k =>$v)
                        @php
                            $count ++;
                        @endphp
                        <tr>
                            <th>
                                {{$count}}
                            </th>
                            <th class="align-middle text-center" style="width: 55px; height: 55px;">
                                <img style="width: 60px; height: 60px" src="{{ asset( 'http://localhost:8000/storage/'.$v->options->photo )}}" alt="ss" />
                            </th>
                            <th>
                                <p> {{$v->name}} </p>
                                <p class="d-flex align-items-center">
                                    <span class="mr-2"> Size: {{$v->options->size}} </span>
                                    <span> Color: <input style=" width: 30px; height: 20px; border: 0;outline: 0; background: unset;
                                " type="color" value="{{$v->options->color}}">  </span>
                                </p>
                            </th>
                            <th>
                                <?php if($v->options->discount) { ?>
                                    <span class="price-new">  {{number_format($v->options->sale_price)}} vnđ</span>
                                    <span class="price-old"> {{number_format($v->price)}} vnđ </span>
                                    <span class="discount"> {{$v->options->discount}} % </span>
                                    <?php } else{ ?>
                                    <span class="price-new">  {{number_format($v->price)}} vnđ</span>
                                <?php } ?>
                            </th>
                            <th>
                                <input class="form-control form-control-mini giohang-qty text-center" type="number" name="qty[{{$v->rowId}}]"
                                    value="{{$v->qty}}" min="1" data-id="{{$v->id}}" data-rowid="{{$v->rowId}}"
                                    data-price="{{$v->price}}">
                            </th>
                            <th>
                                {{number_format($v->price)}}vnđ

                            </th>
                            <th>
                                <span class="giohang-subTotal-{{$v->rowId}}"> {{number_format($v->qty * $v->price)}}vnđ </span>
                            </th>
                            <th>
                                <a href="{{route('cart.remove',$v->rowId)}}" onclick="alert('Bạn có muốn xóa sản phẩm này không');">Xóa</a>
                            </th>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

            @if(Cart::count() <=0)
                <div class="donhang-empty">
                    <img class="lazyload"
                         src="{{ asset('http://localhost:8000/storage/empty-order.png') }}" alt="empty-order" />
                    <p>Không có dữ liệu</p>
                </div>
            @endif
            <div class="giohang-tongtien">
                <p class="mb-0 ">Tổng tiền: <span class="load-total-price"> {{ number_format(Cart::total(),0,',','.')."vnđ" }} </span>  </p>
            </div>


            <div class="giohang-btns ">
                <a href="{{ route('cart.checkout') }}" class="btn btn-primary mr-2"> Thanh toán </a>

                <a class="btn btn-danger" href="{{route('cart.destroy')}}"
                    onclick="alert('Bạn có muốn xóa giỏ hàng không');">Xóa tất cả</a>
            </div>
        </form>
    </div>
</div>
@endsection
