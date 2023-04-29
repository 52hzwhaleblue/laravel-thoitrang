<div class="header">
    <div class="wrap-content d-flex flex-wrap align-items-center justify-content-between">
        <div class="header-left">
            <a class="logo-header peShiner" href="">
                <img class="lazyload"
                        src="{{ asset('http://localhost:8000/storage/'.$logo['photo']) }}" alt="{{ $logo['name'] }}" />
            </a>
            <a class="name-header text-decoration-none" href=""> jean nam c665 </a>

        </div>

        <div class="w-menu">
            <div class="menu">
                <div class="wrap-content">
                    <ul class="d-flex align-items-center justify-content-between">
                        <li><a class="transition" href="{{ route('index') }}" title=""> Trang chủ </a></li>
                        <li><a class="transition" href="{{ route('gioi-thieu') }}" title=""> Giới thiệu </a></li>
                        <li><a class="transition" href="{{ route('san-pham') }}" title="Sản phẩm"> Sản phẩm </a></li>
                        <li><a class="transition" href="{{ route('tin-tuc') }}" title=""> Tin tức </a></li>
                        <li><a class="transition" href="" title=""> Album ảnh </a></li>
                        <li><a class="transition" href="" title=""> Liên hệ </a></li>

                        @auth
                        <li class="mr-3">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        @endauth


                        @guest
                        <li class="mr-3">
                            <a href="{{route('login')}}">
                                <i class="fa fa-user"></i>
                            </a>
                        </li>
                        @endguest

                        {{-- @auth --}}
                        <li class="cart-header">
                            <a href="{{ route('cart.index') }}">
                                <i class="fas fa-shopping-cart"></i>
                                <span> {{ Cart::count() }} </span>
                            </a>
                        </li>
                        {{-- @endauth --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
