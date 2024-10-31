<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Post Types
    |--------------------------------------------------------------------------
    |
    | Here you may specify the post types to be registered by Poet using the
    | Extended CPTs library. <https://github.com/johnbillion/extended-cpts>
    |
    */

    'post' => [
        'product' => [
            'enter_title_here' => 'Введите заголовок',
            'menu_icon' => 'dashicons-book-alt',
            'supports' => [
                'title',
                'editor',
                'comments',
                'revisions',
                'trackbacks',
                'author',
                'excerpt',
                'page-attributes',
                'thumbnail',
                'custom-fields',
                'post-formats',
            ],
            'labels' => [
                'has_one' => 'Продукт',
                'has_many' => 'Продукты',
                'text_domain' => 'sage',
                'name' => 'Продукт',
                'singular_name' => 'Продукт',
                'menu_name' => 'Продукты',
                'name_admin_bar' => 'Продукты',
                'add_new' => 'Добавить продукт',
                'add_new_item' => 'Добавить новый продукт',
                'edit_item' => 'Редактировать продукт',
                'new_item' => 'Новый продукт',
                'view_item' => 'Смотреть продукт',
                'view_items' => 'Смотреть продукты',
                'search_items' => 'Искать продукт',
                'not_found' => 'Продуктов не найдено',
                'not_found_in_trash' => 'В корзине нет продуктов',
                'parent_item-colon' => 'Parent продукт:',
                'all_items' => 'Все продукты',
                'archives' => 'Архив продуктов',
                'attributes' => 'Атрибуты продукта',
                'insert_into_item' => 'Вставить в продукт',
                'uploaded_to_this_item' => 'Загрузить в продукт',
                'featured_image' => 'Изображение продукта',
                'set_featured_image' => 'Установить изображение продукта',
                'remove_featured_image' => 'Удалить изображение продукта',
                'use_featured_image' => 'Использовать изображение продукта',
                'filter_items_list' => 'Фильтровать список продуктов',
                'items_list_navigation' => 'Навигация по списку продуктов',
                'items_list' => 'Список продуктов',
            ],
            'show_in_rest' => true,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'has_archive' => true,
            'hierarchical' => true,
            'menu_position' => NULL,
            'can_export' => true,
            'capability_type' => 'post',
            'rewrite' => [
                'slug' => 'products',
                'hierarchical' => false,
            ],

        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Taxonomies
    |--------------------------------------------------------------------------
    |
    | Here you may specify the taxonomies to be registered by Poet using the
    | Extended CPTs library. <https://github.com/johnbillion/extended-cpts>
    |
    */

    // 'taxonomy' => [
    //     'tools' => [
    //         'links' => ['case'],
    //         'meta_box' => 'simple',
    //         'labels' => [
    //             'singular' => 'Инструмент',
    //             'plural'   => 'Инструменты',
    //             'slug'     => 'tools'
    //         ]
    //     ],

    //     'types' => [
    //         'links' => ['case'],
    //         'meta_box' => 'simple',
    //         'labels' => [
    //             'singular' => 'Категория',
    //             'plural'   => 'Категории',
    //             'slug'     => 'types'
    //         ]
    //     ],



    // ],

    /*
    |--------------------------------------------------------------------------
    | Blocks
    |--------------------------------------------------------------------------
    |
    | Here you may specify the block types to be registered by Poet and
    | rendered using Blade.
    |
    | Blocks are registered using the `namespace/label` defined when
    | registering the block with the editor. If no namespace is provided,
    | the current theme text domain will be used instead.
    |
    | Given the block `sage/accordion`, your block view would be located at:
    |   ↪ `views/blocks/accordion.blade.php`
    |
    | Block views have the following variables available:
    |   ↪ $data    – An object containing the block data.
    |   ↪ $content – A string containing the InnerBlocks content.
    |                Returns `null` when empty.
    |
    */

    'block' => [
        // 'sage/accordion',
    ],

    /*
    |--------------------------------------------------------------------------
    | Block Categories
    |--------------------------------------------------------------------------
    |
    | Here you may specify block categories to be registered by Poet for use
    | in the editor.
    |
    */

    'block_category' => [
        // 'cta' => [
        //     'title' => 'Call to Action',
        //     'icon' => 'star-filled',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Block Patterns
    |--------------------------------------------------------------------------
    |
    | Here you may specify block patterns to be registered by Poet for use
    | in the editor.
    |
    | Patterns are registered using the `namespace/label` defined when
    | registering the block with the editor. If no namespace is provided,
    | the current theme text domain will be used instead.
    |
    | Given the pattern `sage/hero`, your pattern content would be located at:
    |   ↪ `views/block-patterns/hero.blade.php`
    |
    | See: https://developer.wordpress.org/reference/functions/register_block_pattern/
    */

    'block_pattern' => [
        // 'sage/hero' => [
        //     'title' => 'Page Hero',
        //     'description' => 'Draw attention to the main focus of the page, and highlight key CTAs',
        //     'categories' => ['all'],
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Block Pattern Categories
    |--------------------------------------------------------------------------
    |
    | Here you may specify block pattern categories to be registered by Poet for
    | use in the editor.
    |
    */

    'block_pattern_category' => [
        'all' => [
            'label' => 'All Patterns',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Editor Palette
    |--------------------------------------------------------------------------
    |
    | Here you may specify the color palette registered in the Gutenberg
    | editor.
    |
    | A color palette can be passed as an array or by passing the filename of
    | a JSON file containing the palette.
    |
    | If a color is passed a value directly, the slug will automatically be
    | converted to Title Case and used as the color name.
    |
    | If the palette is explicitly set to `true` – Poet will attempt to
    | register the palette using the default `palette.json` filename generated
    | by <https://github.com/roots/palette-webpack-plugin>
    |
    */

    'palette' => [
        // 'red' => '#ff0000',
        // 'blue' => '#0000ff',
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Menu
    |--------------------------------------------------------------------------
    |
    | Here you may specify admin menu item page slugs you would like moved to
    | the Tools menu in an attempt to clean up unwanted core/plugin bloat.
    |
    | Alternatively, you may also explicitly pass `false` to any menu item to
    | remove it entirely.
    |
    */

    'admin_menu' => [
        // 'gutenberg',
    ],

];
