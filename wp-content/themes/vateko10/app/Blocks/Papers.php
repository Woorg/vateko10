<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Roots\Acorn\Application;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Papers extends Block
{
    public function __construct(Application $app)
    {
        /**
         * The block name.
         *
         * @var string
         */
        $this->name = __('Прием макулатуры', 'sage');

        /**
         * The block slug.
         *
         * @var string
         */
        $this->slug = 'papers';

        /**
         * The block description.
         *
         * @var string
         */
        $this->description = __('A simple Papers block.', 'sage');

        /**
         * The block category.
         *
         * @var string
         */
        $this->category = 'common';

        /**
         * The block icon.
         *
         * @var string|array
         */
        $this->icon = 'editor-ul';

        /**
         * The block keywords.
         *
         * @var array
         */
        $this->keywords = [];

        /**
         * The block post type allow list.
         *
         * @var array
         */
        $this->post_types = [];

        /**
         * The parent block type allow list.
         *
         * @var array
         */
        $this->parent = [];

        /**
         * The default block mode.
         *
         * @var string
         */
        $this->mode = 'auto';

        /**
         * The default block alignment.
         *
         * @var string
         */
        $this->align = '';

        /**
         * The default block text alignment.
         *
         * @var string
         */
        $this->align_text = '';

        /**
         * The default block content alignment.
         *
         * @var string
         */
        $this->align_content = '';

        /**
         * The supported block features.
         *
         * @var array
         */
        $this->supports = [
            'align' => true,
            'align_text' => false,
            'align_content' => false,
            'full_height' => false,
            'anchor' => false,
            'mode' => true,
            'multiple' => true,
            'jsx' => true,
        ];

        /**
         * The block styles.
         *
         * @var array
         */
        // $this->styles = [
        //     [
        //         'name' => 'light',
        //         'label' => 'Light',
        //         'isDefault' => true,
        //     ],
        //     [
        //         'name' => 'dark',
        //         'label' => 'Dark',
        //     ]
        // ];

        /**
         * The block preview example data.
         *
         * @var array
         */
        // $this->example = [
        //    'items' => [
        //        ['item' => 'Item one'],
        //        ['item' => 'Item two'],
        //        ['item' => 'Item three'],
        //    ],
        // ];

        parent::__construct($app);
    }

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'papers_title' => $this->papers_title(),
            'papers_text' => $this->papers_text(),
            'papers_image' => $this->papers_image(),
            'list' => $this->list(),
            'list_icon' => $this->list_icon(),
            'list_title' => $this->list_title(),
            'papers_link' => $this->papers_link(),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $papers = new FieldsBuilder('papers');

        $papers
            ->addText('papers_title', [
                'label' => 'Заголовок',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '',
                ],
            ])
            ->addTextarea('papers_text', [
                'label' => 'Текст',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '2',
                'new_lines' => 'br', // Possible values are 'wpautop', 'br', or ''.
            ])
            ->addImage('papers_image', [
                'label' => 'изображение',
                'wrapper' => [
                    'width' => '',
                ],
                'return_format' => 'id',
                'preview_size' => 'thumbnail',
            ])
            ->addRepeater('list', [
                'label' => 'Список',
                'layout' => 'table',
                'min' => 0,
                'max' => 0,
                'button_label' => '',
            ])
            ->addImage('list_icon', [
                'label' => 'Иконка',
                'wrapper' => [
                    'width' => '20',
                ],
                'return_format' => 'id',
                'preview_size' => 'thumbnail',
            ])
            ->addText('list_title', [
                'label' => 'Заголовок',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '80',
                ],
            ])
            ->endRepeater()

            ->addText('papers_link', [
                'label' => 'Url ссылки',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '80',
                ],
            ]);
            // ->addPageLink('papers_link', [
            //     'label' => 'Ссылка на страницу',
            //     'type' => 'page_link',
            //     'instructions' => '',
            //     'required' => 0,
            //     'conditional_logic' => [],
            //     'wrapper' => [
            //         'width' => '',
            //         'class' => '',
            //         'id' => '',
            //     ],
            //     'post_type' => [],
            //     'taxonomy' => [],
            //     'allow_null' => 0,
            //     'allow_archives' => 0,
            //     'multiple' => 0,
            // ]);

        return $papers->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function papers_title()
    {
        return get_field('papers_title');
    }

    public function papers_text()
    {
        return get_field('papers_text');
    }

    public function papers_image()
    {
        return get_field('papers_image');
    }

    public function list()
    {
        return get_field('list');
    }

    public function list_icon()
    {
        return get_field('list_icon');
    }

    public function list_title()
    {
        return get_field('list_title');
    }

    public function papers_link()
    {
        return get_field('papers_link');
    }

    /**
     * Assets to be enqueued when rendering the block.
     *
     * @return void
     */
    public function enqueue()
    {
        //
    }
}
