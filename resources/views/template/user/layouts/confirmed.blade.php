@if(count($confirmed)>0)
@else
    <div class="donhang-empty">
        <img class="lazyload"
             src="{{ asset('http://localhost:8000/storage/empty-order.png') }}" alt="empty-order" />
        <p>Chưa có đơn hàng</p>
    </div>
@endif
