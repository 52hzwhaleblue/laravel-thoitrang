<?php

    $menuArr = [
        'option' =>[
            'name' => 'Options',
            'group' => '.option.',
            'data' => [
                'ma-giam-gia' => [
                    'title' => 'Mã giảm giá',
                    'type' => 'ma-giam-gia',
                    'index' => 'admin.option.ma-giam-gia.index',
                ],
            ]
        ],


        // Sản phẩm
        'product' => [
            'name' => 'Sản phẩm',
            'group' => '.product.',
            'data' =>[
                'product-list' =>[
                    'title' => 'Danh mục cấp 1',
                    'index' => 'admin.product.product-list.index',
                    'thumbs' => [
                        'width'=> 100,
                        'height'=> 100,
                    ]
                ],
                'product-man' =>[
                    'title' => 'Danh mục sản phẩm',
                    'index' => 'admin.product.product-man.index',
                    'thumbs' => [
                        'width'=> 415,
                        'height'=> 500,
                    ]
                ],
                'import' =>[
                    'title' => 'Nhập / Xuất Sản phẩm',
                    'index' => 'admin.product.importProduct',
                ]
            ]
        ],

        // Bài viết
        'post' => [
            'name' => 'Bài viết',
            'group' => '.post.',
            'data' =>[
                'tin-tuc' =>[
                    'title' => 'Tin tức',
                    'type' => 'tin-tuc',
                    'index' => 'admin.post.tin-tuc.index',
                    'thumbs' => [
                        'width'=>500,
                        'height'=>500,
                    ]
                ],
                'dich-vu' =>[
                    'title' => 'Dịch vụ',
                    'type' => 'dich-vu',
                    'index' => 'admin.post.dich-vu.index',
                    'thumbs' => [
                        'width'=>875,
                        'height'=>400,
                    ]
                ],
                'tieu-chi' =>[
                    'title' => 'Tiêu chí',
                    'type' => 'tieu-chi',
                    'index' => 'admin.post.tieu-chi.index',
                    'thumbs' => [
                        'width'=>70,
                        'height'=>65,
                    ]
                ],
            ]
        ],

        // Hình ảnh Video
        'photo' =>[
            'name' => 'Hình ảnh - Video',
            'group' => '.photo.',
            'data' => [
                'slideshow' => [
                    'title' => 'Slideshow',
                    'type' => 'slideshow',
                    'index' => 'admin.photo.slideshow.index',
                    'thumbs' => [
                        'width'=>1366,
                        'height'=>600,
                    ]
                ],
                'banner' => [
                    'title' => 'Banner',
                    'type' => 'banner',
                    'index' => 'admin.photo.banner.index',
                    'thumbs' => [
                        'width'=>0,
                        'height'=>0,
                    ]
                ],
                'gioithieu-slide' => [
                    'title' => 'Giới thiệu Slide',
                    'type' => 'gioithieu-slide',
                    'index' => 'admin.photo.gioithieu-slide.index',
                    'thumbs' => [
                        'width'=>420,
                        'height'=>620,
                    ]
                ],
                'thu-vien-anh' => [
                    'title' => 'Thư viện ảnh',
                    'type' => 'thu-vien-anh',
                    'index' => 'admin.photo.thu-vien-anh.index',
                    'thumbs' => [
                        'width'=>830,
                        'height'=>520,
                    ]
                ],
            ]
        ],

        // Quản lý Hình ảnh Tĩnh
        'photo-static' =>[
            'name' => 'Hình ảnh Tĩnh',
            'group' => '.photo-static.',
            'data' => [
                'logo' => [
                    'title' => 'Logo',
                    'type' => 'logo',
                    'index' => 'admin.photo-static.logo.index',
                    'thumbs' => [
                        'width'=>80,
                        'height'=>80,
                    ]
                ],
                'banner-quangcao' => [
                    'title' => 'Banner quảng cáo',
                    'type' => 'banner-quangcao',
                    'index' => 'admin.photo-static.banner-quangcao.index',
                    'thumbs' => [
                        'width'=>1366,
                        'height'=>600,
                    ]
                ],
            ]
        ],

        // Quản lý trang tĩnh
        'static' =>[
            'name' => 'Trang tĩnh',
            'group' => '.static.',
            'data' => [
                'gioi-thieu' => [
                    'title' => 'Giới thiệu',
                    'type' => 'gioi-thieu',
                    'index' => 'admin.static.gioi-thieu.index',
                ],
                'footer' => [
                    'title' => 'Footer',
                    'type' => 'footer',
                    'index' => 'admin.static.footer.index',
                ],
            ]
        ],




    ];
    return $menuArr;
?>
