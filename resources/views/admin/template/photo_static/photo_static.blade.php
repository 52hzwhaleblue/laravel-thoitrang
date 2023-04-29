{{-- Kiểm tra có dữ liệu chưa, chưa có thì add ngược lại cập nhật --}}
@if(!empty($data))
    @include('admin.template.photo_static.photo_static_edit')
@endif

@if(empty($data))
    @include('admin.template.photo_static.photo_static_add')
@endif
