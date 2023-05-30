<!-- Navbar-->
<header class="app-header">
    <a class="app-header__logo" href="{{ route('admin.index') }}">Vali</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <a href="{{ route('index') }}" class="d-flex align-items-center mr-3">
            <i class="fa-solid fa-reply text-white"></i>
        </a>
        <li class="app-search">
            <input class="app-search__input" type="search" placeholder="Search" />
            <button class="app-search__button">
                <i class="fa fa-search"></i>
            </button>
        </li>
        <!--Notification Menu-->
        <li class="dropdown">
            <a class="app-nav__item position-relative" href="#" data-toggle="dropdown" aria-label="Show notifications">
                <lord-icon
                    src="https://cdn.lordicon.com/psnhyobz.json"
                    trigger="loop"
                    delay="600"
                    colors="primary:#ffffff"
                    state="loop"
                    style="width:22px;height:22px">
                </lord-icon>
                <span class="chuong-notification"> {{ count($count_total_notifications)  }} </span>
            </a>

            <ul class="app-notification dropdown-menu dropdown-menu-right">
                <li class="app-notification__title">
                    You have {{ count($count_total_notifications) }} new notifications.
                </li>
                <div class="app-notification__content">
                    <li>
                        <a class="app-notification__item" href="{{route('admin.order.index')}}">
                                <span class="app-notification__icon">
                                    <lord-icon
                                        src="https://cdn.lordicon.com/pimvysaa.json"
                                        trigger="hover"
                                        colors="outline:#121331,primary:#b26836,secondary:#ffc738"
                                        style="width:45px;height:45px">
                                    </lord-icon>
                                </span>
                            <div>
                                <p class="app-notification__message">
                                    Bạn có <b class="text-danger order_notifications"> {{count($count_order_notifications)}} </b> đơn hàng cần xử lý
                                </p>
                                <p class="app-notification__meta">2 min ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="app-notification__item" href="javascript:;">
                            <span class="app-notification__icon">
                                <lord-icon
                                    src="https://cdn.lordicon.com/flvisirw.json"
                                    trigger="hover"
                                    colors="primary:#646e78,secondary:#4bb3fd,tertiary:#ebe6ef"
                                    style="width:45px;height:45px">
                                </lord-icon>
                            </span>
                            <div>
                                <p class="app-notification__message">
                                    Bạn có <b class="text-danger"> {{count($count_chat_notifications)}} </b> chat cần xử lý
                                </p>
                                <p class="app-notification__meta">5 min ago</p>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a class="app-notification__item" href="javascript:;">
                            <span class="app-notification__icon">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x text-success"></i>
                                    <i class="fa fa-money fa-stack-1x fa-inverse"></i>
                                </span>
                            </span>
                            <div>
                                <p class="app-notification__message">
                                    Transaction complete
                                </p>
                                <p class="app-notification__meta">2 days ago</p>
                            </div>
                        </a>
                    </li>
                    <li class="app-notification__footer">
                        <a href="#">See all notifications.</a>
                    </li>
                </div>

            </ul>
        </li>

        <!-- User Menu-->
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li>
                    <a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a>
                </li>
                <li>
                    <a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a>
                </li>
                @auth()
                <li>
                    <a class="dropdown-item dangxuat-btn" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Đăng xuất
                    </a>

                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" >
                        @csrf
                    </form>
                </li>
                @endauth
            </ul>
        </li>
    </ul>
</header>
