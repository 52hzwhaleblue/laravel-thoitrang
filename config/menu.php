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
                'list' =>[
                    'title' => 'Danh mục cấp 1',
                    'index' => 'admin.product.product-list.index',
                ],
                'man' =>[
                    'title' => 'Danh mục sản phẩm',
                    'index' => 'admin.product.product-man.index',
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
                'video' => [
                    'title' => 'Video',
                    'type' => 'video',
                    'index' => 'admin.photo.video.index',
                    'thumbs' => [
                        'width'=>0,
                        'height'=>0,
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
                'quang-cao' => [
                    'title' => 'Quảng cáo',
                    'type' => 'quang-cao',
                    'index' => 'admin.photo.quang-cao.index',
                    'thumbs' => [
                        'width'=>870,
                        'height'=>665,
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
                'social' => [
                    'title' => 'Social',
                    'type' => 'social',
                    'index' => 'admin.photo.social.index',
                    'thumbs' => [
                        'width'=>42,
                        'height'=>42,
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
                'lien-he' => [
                    'title' => 'Liên hệ',
                    'type' => 'lien-he',
                    'index' => 'admin.static.lien-he.index',
                ],
                'slogan' => [
                    'title' => 'Slogan',
                    'type' => 'slogan',
                    'index' => 'admin.static.slogan.index',
                ],
                'copyright' => [
                    'title' => 'Copyright',
                    'type' => 'copyright',
                    'index' => 'admin.static.copyright.index',
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
