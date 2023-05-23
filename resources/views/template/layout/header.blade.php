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
                                Đăng xuất
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        <li>
                            <a href="{{route('user.show',Auth::user()->id )}}">
                                <lord-icon
                                    src="https://cdn.lordicon.com/zthozvfn.json"
                                    trigger="hover"
                                    colors="primary:#b26836,secondary:#4bb3fd,tertiary:#f9c9c0,quaternary:#ebe6ef"
                                    style="width:50px;height:50px">
                                </lord-icon>
                            </a>
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
