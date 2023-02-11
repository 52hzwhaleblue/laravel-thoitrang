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
        ]
    ];
    return $menuArr;
?>
