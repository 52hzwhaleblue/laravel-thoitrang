<?php

    $menuArr = [
        // Options
        'option' =>[
            'name' => 'Options',
            'group' => '.option.',
            'data' => [
                'promo-code' => [
                    'title' => 'Promo Code',
                    'type' => 'promo-code',
                    'index' => 'admin.option.promo-code.index',
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
                ],
                'tieu-chi' =>[
                    'title' => 'Tiêu chí',
                    'type' => 'tieu-chi',
                    'index' => 'admin.post.tieu-chi.index',
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
                ],
                'video' => [
                    'title' => 'Video',
                    'type' => 'video',
                    'index' => 'admin.photo.video.index',
                ],
                'banner' => [
                    'title' => 'Banner',
                    'type' => 'banner',
                    'index' => 'admin.photo.banner.index',
                ],
                'gioithieu-slide' => [
                    'title' => 'Giới thiệu Slide',
                    'type' => 'gioithieu-slide',
                    'index' => 'admin.photo.gioithieu-slide.index',
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