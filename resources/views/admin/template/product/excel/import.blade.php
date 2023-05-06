@extends('admin.app') @section('title') Import/Export Products @endsection

@section('content')
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
