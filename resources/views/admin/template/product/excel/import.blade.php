@extends('admin.app') @section('title') Quản lý sản phẩm cấp 1 @endsection

@section('content')
    <form action="{{route('admin.product.uploadProduct')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for=""> Select file </label>
        <input type="file" name="file" class="form-control">
        <div class="mt-5">
            <button type="submit"> Upload File </button>
        </div>
    </form>
@endsection
