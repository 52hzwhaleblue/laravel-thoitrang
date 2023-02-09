<?php

    $menuArr = [
        // Sản phẩm
        'product' => [
            'name' => 'Sản phẩm',
            'group' => '.product.',
            'data' =>[
                'list' =>[
                    'nametype' => 'Danh mục cấp 1',
                    'index' => 'admin.product.product-list.index',
                ],
                'cat' =>[
                    'nametype' => 'Danh mục cấp 2',
                    'index' => 'admin.product.product-cat.index',
                ],
                'man' =>[
                    'nametype' => 'Danh mục sản phẩm',
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
                    'nametype' => 'Tin tức',
                    'type' => 'tin-tuc',
                    'view' => 'news',
                    'index' => 'admin.post.tin-tuc.index',
                ],
                'tieu-chi' =>[
                    'nametype' => 'Tiêu chí',
                    'type' => 'tieu-chi',
                    'view' => 'news',
                    'action' => 'tieu-chi',
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
                    'nametype' => 'Slideshow',
                    'type' => 'slideshow',
                    'index' => 'admin.photo.slideshow.index',
                ],
                'video' => [
                    'nametype' => 'Video',
                    'type' => 'video',
                    'index' => 'admin.photo.video.index',
                ],
                'banner' => [
                    'nametype' => 'Banner Quảng Cáo',
                    'type' => 'banner',
                    'index' => 'admin.photo.banner.index',
                ],
            ]
        ]
    ];
    return $menuArr;
?>
