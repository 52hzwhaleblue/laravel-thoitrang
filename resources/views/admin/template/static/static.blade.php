{{-- Kiểm tra có dữ liệu chưa, chưa có thì add ngược lại cập nhật --}}
@if(!empty($data))
@include('admin.template.static.static_edit')
@endif

@if(empty($data))
@include('admin.template.static.static_add')
@endif