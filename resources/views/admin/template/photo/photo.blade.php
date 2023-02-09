@php
    $create = 'admin.photo.'.$type.'.create';
    $edit = 'admin.photo.'.$type.'.edit';
    $destroy = 'admin.photo.'.$type.'.destroy';
@endphp

@extends('admin.app')
@section('title')
    Quản lý {{ $type }}
@endsection

@section('content')
<div class="mb-3">
    <a href=" {{route($create)}} " class="btn btn-primary mr-2">Tạo mới</a>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th width="10%">STT</th>
                                <th>Hình</th>
                                <th width="30%">Tiêu đề</th>
                                <th>Nổi bật</th>
                                <th>Hiển thị</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $k =>$v)
                                <tr>
                                    <th>
                                        <div class="custom-control custom-checkbox my-checkbox">
                                            <input type="checkbox" name="list_check[]" value="{{ $v['id'] }}" class="custom-control-input" id="selectall-checkbox">
                                        </div>
                                    </th>
                                    <th class="align-middle">
                                        <input
                                            type="number"
                                            class="form-control form-control-mini m-auto update-numb"
                                            min="0"
                                            value="1"
                                            data-id="1"
                                            data-table="products"
                                        />
                                    </th>
                                    <th class="align-middle text-center"  style="width: 55px; height: 55px;" >
                                        <a
                                            class="d-block"
                                            href=" {{
                                                route('admin.product.product-man.edit', $v['slug'])
                                            }} "
                                        >
                                            <img
                                                style="width: 60px; height: 60px"
                                                src="{{
                                                    asset(
                                                        'backend/assets/img/products/'.$v['photo']
                                                    )
                                                }}"
                                                alt="ss"
                                            />
                                        </a>
                                    </th>
                                    <th class="align-middle">
                                        <a
                                            href="{{
                                                route('admin.product.product-man.edit', $v['slug'])
                                            }}"
                                        >
                                            {{$v['name']}}
                                        </a>
                                    </th>
                                    <th class="align-middle">
                                        <div class="dropdown">
                                            <a
                                                class="btn btn-success dropdown-toggle"
                                                href="#"
                                                role="button"
                                                id="dropdownMenuLink"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                            >
                                                Gallery
                                            </a>

                                            <ul
                                                class="dropdown-menu"
                                                aria-labelledby="dropdownMenuLink"
                                            >
                                                <li>
                                                    <a
                                                        class="dropdown-item"
                                                        href="#"
                                                        >Action</a
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                    </th>
                                    @foreach ($status as $k => $eachStatus)
                                        <th class="align-middle">
                                            <div
                                                class="custom-control custom-checkbox my-checkbox"
                                            >
                                                <input
                                                    type="checkbox"
                                                    class="custom-control-input show-checkbox arrStatus"
                                                    id="show-checkbox-{{$eachStatus }}-{{ $v['id'] }}"
                                                    data-table="product_lists"
                                                    data-id="{{ $v['id'] }}"
                                                    data-attr="{{ $eachStatus }}"
                                                    @if (in_array($eachStatus,explode(',',$v['status']))) checked @endif
                                                />
                                            </div>
                                        </th>
                                    @endforeach

                                    <th class="align-middle d-flex">
                                        <a href=" {{route('admin.product.product-man.edit', $v['slug'] )}} " class="btn btn-primary mr-2">
                                            Sửa
                                        </a>

                                        <form action="{{ route('admin.product.product-man.destroy', $v->id) }}" method="post">
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
