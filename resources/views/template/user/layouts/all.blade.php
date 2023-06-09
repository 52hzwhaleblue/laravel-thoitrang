@if(count($onDelivery)>0)
    <div class="donhang-items dangvanchuyen-items">
        @foreach($onDelivery as $k => $v)
            <div class="donhang-item dangvanchuyen-item">
                <p class="dangvanchuyen-time">Giao vào Thứ tư, 07/06</p>
                <p class="dangvanchuyen-status">Đang vận chuyển</p>

                <div class="dangvanchuyen-box">
                    <div class="donhang-img">
                        <img class="lazyload"
                             src="{{ asset('http://localhost:8000/storage/'.$v->orderDetail[0]->product->photo) }}" alt="{{$v->orderDetail[0]->product->name}}" />
                        <p class="donhang-qty"> x{{$v->orderDetail[0]->quantity}} </p>
                    </div>
                    <div class="donhang-info">
                        <div class="donhang-name">
                            <span> {{$v->orderDetail[0]->product->name}} </span>
                            <div class="pronb-price">
                                <?php if($v->orderDetail[0]->product->discount) {?>
                                    <span class="price-new">  {{number_format($v->orderDetail[0]->product->sale_price)}} vnđ </span>
                                <?php } else{ ?>
                                    <span class="price-new">  {{number_format($v->orderDetail[0]->product->regular_price)}}  vnđ  </span>
                                <?php } ?>
                            </div>
                        </div>
                        <p class="donhang-size"> Size:  {{$v->orderDetail[0]->size}} </p>
                        <p class="donhang-color" style="background: {{$v->orderDetail[0]->color}}"> </p>
                    </div>

                </div>
            </div>
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
                            <?php if($v->product->discount) {?>
                                <span class="price-new">  {{number_format($v->product->sale_price)}} vnđ </span>
                                <?php } else{ ?>
                                <span class="price-new">  {{number_format($v->product->regular_price)}}  vnđ  </span>
                            <?php } ?>
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
