<!DOCTYPE html>
<html lang="en">
<head>
    @include('template.layout.head')
    @include('template.layout.css')
</head>
<body>
    @include('template.layout.header')

    @if($ProfileComposer['com'] == '' || $ProfileComposer['com'] == 'index')
        @include('template.layout.slide')
    @endif

    <div class="wrap-content">
        @if($ProfileComposer['com'] == '' || $ProfileComposer['com'] == 'index')
            {{-- @include('index.sindex') --}}
        @endif
        @yield('content')
    </div>

    @include('template.layout.footer')
    @include('template.layout.js')
</body>
</html>
