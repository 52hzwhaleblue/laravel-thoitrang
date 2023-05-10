@extends('admin.app') @section('title') Quản lý Nhập / Xuất  Sản phẩm @endsection
@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    @if(session()->has('warning'))
        <div class="alert alert-danger">
            {{ session()->get('warning') }}
        </div>
    @endif

    <form action="{{route('admin.product.uploadProduct')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for=""> Select file </label>
        <input type="file" name="file" accept=".xlsx" class="form-control">
        <div class="mt-2">
            <button type="submit" class="btn btn-primary"> Upload File </button>
        </div>
    </form>

    <form action="{{route('admin.product.exportProduct')}}" method="post">
        @csrf
        <div class="mt-2">
            <button type="submit" class="btn btn-info"> Export File </button>
        </div>
    </form>

@endsection
