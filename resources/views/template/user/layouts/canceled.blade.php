@if(count($cancled)>0)
    <div class="donhang-items ">
        @foreach($cancled as $k => $v)
            <div class="donhang-item ">
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
        @endforeach
    </div>
@endif
