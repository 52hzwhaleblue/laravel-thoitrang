<div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item @if ($ProfileComposer['com'] == 'admin.index') active @endif">
            <a
                href="{{ route('admin.index') }}"
            >
                Bảng điều khiển
            </a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{$ProfileComposer['url']}} "> @yield('title') </a>
        </li>
    </ul>
</div>
