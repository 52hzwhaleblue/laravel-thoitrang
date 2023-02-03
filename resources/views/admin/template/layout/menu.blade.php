<?php
    $menus = config('menu');
    // dd($menus);
?>

<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div>
            <p class="app-sidebar__user-name">John Doe</p>
            <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
    </div>
    <ul class="app-menu">
        <?php $routeName = \Request::route()->getName() ?>


        @foreach ($menus as $m )
        <?php $a = strpos($routeName, $m['group']) ?>
            <li class="treeview @if ($a > 0) is-expanded @endif">
                <a class="app-menu__item" href="#" data-toggle="treeview"
                    ><i class="app-menu__icon fa fa-laptop"></i
                    ><span class="app-menu__label">Quản lý {{ $m['name'] }}</span
                    ><i class="treeview-indicator fa fa-angle-right"></i
                ></a>

                @if (!empty($m['data']))
                <ul class="treeview-menu ">
                    @foreach ($m['data'] as $m1 )
                    <li>
                        <a class="treeview-item
                        @if($ProfileComposer['com'] == $m1['index']) active  @endif" href="{{ route($m1['index']) }}"
                            ><i class="icon fa fa-circle-o"></i>
                            {{$m1['nametype']}}
                        </a>
                    </li>
                    @endforeach
                </ul>
                @endif
            </li>
        @endforeach

        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview"
                ><i class="app-menu__icon fa fa-laptop"></i
                ><span class="app-menu__label">Quản lý Trang tĩnh</span
                ><i class="treeview-indicator fa fa-angle-right"></i
            ></a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="bootstrap-components.html"
                        ><i class="icon fa fa-circle-o"></i> Giới thiệu</a>
                </li>
                <li>
                    <a
                        class="treeview-item"
                        href="https://fontawesome.com/v4.7.0/icons/"
                        target="_blank"
                        rel="noopener"
                        ><i class="icon fa fa-circle-o"></i> Video</a
                    >
                </li>
            </ul>
        </li>

        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview"
                ><i class="app-menu__icon fa fa-laptop"></i
                ><span class="app-menu__label">Quản lý Hình ảnh - Video</span
                ><i class="treeview-indicator fa fa-angle-right"></i
            ></a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="bootstrap-components.html"
                        ><i class="icon fa fa-circle-o"></i> Slideshow</a>
                </li>
                <li>
                    <a
                        class="treeview-item"
                        href="https://fontawesome.com/v4.7.0/icons/"
                        target="_blank"
                        rel="noopener"
                        ><i class="icon fa fa-circle-o"></i> Video</a
                    >
                </li>
            </ul>
        </li>

        <li>
            <a class="app-menu__item" href="charts.html"
                ><i class="app-menu__icon fa fa-pie-chart"></i
                ><span class="app-menu__label">Quản lý đơn hàng</span></a
            >
        </li>

        <li>
            <a class="app-menu__item" href="charts.html"
                ><i class="app-menu__icon fa fa-pie-chart"></i
                ><span class="app-menu__label">Thiết lập thông tin</span></a
            >
        </li>
    </ul>
</aside>
