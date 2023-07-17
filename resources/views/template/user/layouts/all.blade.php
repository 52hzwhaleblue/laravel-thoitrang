@if(count($onDelivery)>0)
    <div class="donhang-items dangvanchuyen-items">
        <p class="dangvanchuyen-time">Giao vào Thứ tư, 07/06</p>
        <p class="dangvanchuyen-status">Đang vận chuyển</p>
        @foreach($onDelivery as $k => $v)
                <?php foreach ($v->orderDetail as $item) { ?>
            <div class="donhang-item dangvanchuyen-item">
                <div class="dangvanchuyen-box">
                    <div class="donhang-img">
                        <img class="lazyload"
                             src="{{ asset('http://localhost:8000/storage/'.$item->product->photo) }}" alt="{{$item->product->name}}" />
                        <p class="donhang-qty"> x{{$item->quantity}} </p>
                    </div>
                    <div class="donhang-info">
                        <div class="donhang-name">
                            <span> {{$item->product->name}} </span>
                            <div class="pronb-price">
                                <span class="price-new">  {{number_format($item->price)}}  vnđ  </span>
                            </div>
                        </div>
                        <p class="donhang-size"> Size:  {{$item->size}} </p>
                        <p class="donhang-color" style="background: {{$item->color}}"> </p>
                    </div>
                </div>
            </div>
            <?php } ?>
        @endforeach
    </div>
@endif

@if(count($order_details)>0)
    <div class="donhang-items">
        @foreach($order_details as $k => $v)
            <div class="donhang-item">
                <div class="donhang-img">
                    <img class="lazyload"
                         src="{{ asset('http://localhost:8000/storage/'.$v->product->photo) }}" alt="{{$v->product->name}}" />
                    <p class="donhang-qty"> x{{$v->quantity}} </p>
                </div>
                <div class="donhang-info">
                    <div class="donhang-name">
                        <span> {{$v->product->name}} </span>
                        <div class="pronb-price">
                            <span class="price-new">  {{number_format($v->price)}}  vnđ  </span>
                        </div>
                    </div>
                        <p class="donhang-size"> Size:  {{$v->size}} </p>
                        <p class="donhang-color" style="background: {{$v->color}}"> </p>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="donhang-empty">
        <img class="lazyload"
             src="{{ asset('http://localhost:8000/storage/empty-order.png') }}" alt="empty-order" />
        <p>Chưa có đơn hàng</p>
    </div>
@endif
