@php
    $create = 'admin.option.' . $type . '.create';
    $edit = 'admin.option.' . $type . '.edit';
    $destroy = 'admin.option.' . $type . '.destroy';

@endphp

@extends('admin.app')
@section('title')
    Quản lý {{ $type }}
@endsection

@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="mb-3">
        <a href=" {{ route($create) }} " class="btn btn-primary mr-2">Tạo mới</a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th width="20%">Tiêu đề</th>
                                    <th width="20%">Mã giảm giá</th>
                                    <th width="20%">Điều kiện đơn hàng giảm</th>
                                    <th width="20%">Giá trị giảm (%) </th>
                                    <th width="10%">Số lượng </th>
                                    <th width="20%">Ngày hết hạn </th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $k => $v)
                                    <tr>
                                        <th class="align-middle">
                                            <a class="text-dark" href=" {{ route('admin.option.' . $type . '.edit', $v['id']) }} ">
                                                {{ $v['name'] }}
                                            </a>
                                        </th>
                                        <th class="align-middle">
                                            <a class="text-dark" href=" {{ route('admin.option.' . $type . '.edit', $v['id']) }} ">
                                                {{ $v['code'] }}
                                            </a>
                                        </th>
                                        <th class="align-middle">
                                            {{$v['order_price_conditions'] ? number_format($v['order_price_conditions']).' vnđ' : ''}}

                                        </th>
                                        <th class="align-middle">
                                            {{$v['discount_price'] ? number_format($v['discount_price']).' %' : ''}}
                                        </th>
                                        <th class="align-middle">
                                            {{ $v['limit'] }}
                                        </th>
                                        <th class="align-middle">
                                            {{ $v['end_date'] }}
                                        </th>

                                        <th class="align-middle d-flex">
                                            <a href=" {{ route('admin.option.' . $type . '.edit', $v['id']) }} "
                                                class="btn btn-primary mr-2">
                                                Sửa
                                            </a>

                                            <form action="{{ route('admin.option.' . $type . '.destroy', $v->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">
                                                    Xóa
                                                </button>
                                            </form>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
