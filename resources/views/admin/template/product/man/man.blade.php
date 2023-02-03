@extends('admin.app') @section('title') Quản lý sản phẩm @endsection
@section('content')
<div class="mb-3">
    <a
        href="{{ route('admin.product.product-man.create') }}"
        class="btn btn-primary mr-2"
        >Tạo mới</a
    >
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
                    <table
                        class="table table-hover table-bordered"
                        id="sampleTable"
                    >
                        <thead>
                            <tr>
                                <th width="10%">STT</th>
                                <th>Hình</th>
                                <th width="30%">Tiêu đề</th>
                                <th>Gallery</th>
                                <th>Nổi bật</th>
                                <th>Hiển thị</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="align-middle">
                                    <input
                                        type="number"
                                        class="form-control form-control-mini m-auto update-numb"
                                        min="0"
                                        value="1"
                                        data-id="1"
                                        data-table="product_list"
                                    />
                                </th>
                                <th class="align-middle">
                                    <a
                                        class="d-block"
                                        href=" {{
                                            route('admin.product.product-man.edit', 2)
                                        }} "
                                    >
                                        <img
                                            style="width: 60px; height: 60px"
                                            src="{{
                                                asset(
                                                    'backend/assets/img/aaa.jpg'
                                                )
                                            }}"
                                            alt="ss"
                                        />
                                    </a>
                                </th>
                                <th class="align-middle">
                                    <a
                                        href="{{
                                            route('admin.product.product-man.edit', 2)
                                        }}"
                                    >
                                        Tiêu đề
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
                                <th class="align-middle">
                                    <div
                                        class="custom-control custom-checkbox my-checkbox"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input show-checkbox"
                                            id="show-checkbox-noibat-1"
                                            data-table="product_list"
                                            data-id="1"
                                            data-attr="noibat"
                                            checked=""
                                        />
                                    </div>
                                </th>
                                <th class="align-middle">
                                    <div
                                        class="custom-control custom-checkbox my-checkbox"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input show-checkbox"
                                            id="show-checkbox-noibat-1"
                                            data-table="product_list"
                                            data-id="1"
                                            data-attr="noibat"
                                            checked=""
                                        />
                                    </div>
                                </th>
                                <th class="align-middle">
                                    <a href=" {{route('admin.product.product-man.edit', 2)}} " class="btn btn-primary mr-2">
                                        Sửa
                                    </a>

                                    <a href=" {{route('admin.product.product-man.destroy',2)}} " class="btn btn-danger"> xóa </a>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
