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
                    @foreach (Cart::content() as $k =>$row)
                        @php
                            $count ++;
                        @endphp
                        <tr>
                            <th>
                                {{$count}}
                            </th>
                            <th class="align-middle text-center" style="width: 55px; height: 55px;">
                                <img style="width: 60px; height: 60px" src="{{ asset( 'http://localhost:8000/storage/'.$row->options->photo )}}" alt="ss" />
                            </th>
                            <th>
                                <p> {{$row->name}} </p>
                                <p class="d-flex align-items-center">
                                    <span class="mr-2"> Size: {{$row->options->size}} </span>
                                    <span> Color: <input style=" width: 30px; height: 20px; border: 0;outline: 0; background: unset;
                                " type="color" value="{{$row->options->color}}">  </span>
                                </p>
                            </th>
                            <th>
                                {{number_format($row->price,0,',','.')}}vnđ
                            </th>
                            <th>
                                <input class="form-control form-control-mini giohang-qty text-center" type="number" name="qty[{{$row->rowId}}]"
                                    value="{{$row->qty}}" min="1" data-id="{{$row->id}}" data-rowid="{{$row->rowId}}"
                                    data-price="{{$row->price}}">
                            </th>
                            <th>
                                {{number_format($row->price)}}vnđ

                            </th>
                            <th>
                                <span class="giohang-subTotal-{{$row->rowId}}"> {{number_format($row->qty * $row->price)}}vnđ </span>
                            </th>
                            <th>
                                <a href="{{route('cart.remove',$row->rowId)}}" onclick="alert('Bạn có muốn xóa sản phẩm này không');">Xóa</a>
                            </th>
                        </tr>
                    @endforeach
                @else
                <div class="">
                    <h1 class="alert"> Không có dữ liệu </h1>
                </div>
                @endif

                </tbody>
            </table>


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
