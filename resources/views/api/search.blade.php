@if(count($data))
    @foreach($data as $v)
        <div class="item_sp d-flex flex-wrap justify-content-between">
            <a class="img scale-img" href=chi-tiet-san-pham/{{$v->slug}}/{{$v->id}} >
                <img src="{{asset("http://localhost:8000/storage/$v->photo")}}" alt="{{$v->name}}" />
            </a>
            <div class="ttsp">
                <h3 class="mb-0"><a class="text-decoration-none text-split-1" href="{{ $v->slug }}" title="{{ $v->name }}">{{ $v->name }}</a></h3>
                <div class="pronb-price">
                        <?php if($v->discount) { ?>
                    <span class="price-new">  {{number_format($v->sale_price)}} vnđ</span>
                    <span class="price-old"> {{number_format($v->regular_price)}} vnđ </span>
                    <span class="discount"> {{$v->discount}} % </span>
                    <?php } else{ ?>
                    <span class="price-new">  {{number_format($v->regular_price)}} vnđ</span>
                    <?php } ?>
                </div>
            </div>
        </div>
    @endforeach
@endif
