@php
$menus = config('menu');
@endphp

<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div>
            <p class="app-sidebar__user-name">{{\Illuminate\Support\Facades\Auth::user()->fullName}}</p>
            <p class="app-sidebar__user-designation">{{\Illuminate\Support\Facades\Auth::user()->email}}</p>
        </div>
    </div>
    <ul class="app-menu">
        @php $routeName = \Request::route()->getName() @endphp

        @foreach ($menus as $m )
        @php $a = strpos($routeName, $m['group']) @endphp
        <li class="treeview @if ($a > 0) is-expanded @endif">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span
                    class="app-menu__label">Quản lý {{ $m['name'] }}</span><i
                    class="treeview-indicator fa fa-angle-right"></i></a>

            @if (!empty($m['data']))
            <ul class="treeview-menu ">
                @foreach ($m['data'] as $m1 )
                <li>
                    <a class="treeview-item
                        @if($ProfileComposer['com'] == $m1['index']) active  @endif"
                        href="{{ $m1['index'] ? route($m1['index']) : '' }}">
                        <i class="fa-regular fa-circle"></i>
                        {{$m1['title']}}
                    </a>
                </li>
                @endforeach
            </ul>
            @endif
        </li>
        @endforeach

        <li>
            <a class="app-menu__item" href="{{ route('admin.order.index') }}"><i class="app-menu__icon fa fa-pie-chart"></i><span
                    class="app-menu__label">Quản lý đơn hàng</span></a>
        </li>

        <li>
            <a class="app-menu__item" href=""><i class="app-menu__icon fa fa-pie-chart"></i><span
                    class="app-menu__label">Thiết lập thông tin</span></a>
        </li>
    </ul>
</aside>
