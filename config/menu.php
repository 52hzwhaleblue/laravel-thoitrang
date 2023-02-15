<?php

    $menuArr = [
        // Sản phẩm
        'product' => [
            'name' => 'Sản phẩm',
            'group' => '.product.',
            'data' =>[
                'list' =>[
                    'title' => 'Danh mục cấp 1',
                    'index' => 'admin.product.product-list.index',
                ],
                'cat' =>[
                    'title' => 'Danh mục cấp 2',
                    'index' => 'admin.product.product-cat.index',
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
                    'title' => 'slogan',
                    'type' => 'slogan',
                    'index' => 'admin.static.slogan.index',
                ],
                'copyright' => [
                    'title' => 'copyright',
                    'type' => 'copyright',
                    'index' => 'admin.static.copyright.index',
                ],
                'footer' => [
                    'title' => 'footer',
                    'type' => 'footer',
                    'index' => 'admin.static.footer.index',
                ],
            ]
        ],


    ];
    return $menuArr;
?>
