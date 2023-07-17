@if(count($confirmed)>0)
    <div class="donhang-items ">
        @foreach($confirmed as $k => $v)
        <?php foreach ($v->orderDetail as $item) { ?>
            <div class="donhang-item ">
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
        <?php } ?>
        @endforeach
    </div>
@endif
