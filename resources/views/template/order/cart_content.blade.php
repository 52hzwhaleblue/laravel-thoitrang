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
                {{$row->name}}
            </th>
            <th>
                {{number_format($row->options->sale_price,0,',','.')}}vnđ
            </th>
            <th>
                <input class="form-control form-control-mini giohang-qty" type="number" name="qty[{{$row->rowId}}]"
                    value="{{$row->qty}}" min="1" data-id="{{$row->id}}" data-rowid="{{$row->rowId}}"
                    data-price="{{$row->price}}">
            </th>
            <th>
                {{number_format($row->options->sale_price)}}vnđ

            </th>
            <th>
                <span class="giohang-subTotal-{{$row->id}}"> {{number_format($row->qty * $row->options->sale_price)}}vnđ </span>
            </th>
            <th>
                <a href="{{route('cart.remove',$row->rowId)}}" onclick="alert('Bạn có muốn xóa sản phẩm này không');">Xóa</a>
            </th>
            <th>
                <p
                data-rowid="{{$row->rowId}}"
                data-id="{{$row->id}}"
                class="remove-ajax remove-ajax-{{$row->rowId}}">
                Xóa ajax
            </p>
            </th>
        </tr>
    @endforeach
@else
<div class="">
    <h1 class="alert"> Không có dữ liệu </h1>
</div>
@endif
