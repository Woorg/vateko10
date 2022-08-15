<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Roots\Acorn\Application;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Partners extends Block
{
    public function __construct(Application $app)
    {
        /**
         * The block name.
         *
         * @var string
         */
        $this->name = __('Стать партнером', 'sage');

        /**
         * The block slug.
         *
         * @var string
         */
        $this->slug = 'partners';

        /**
         * The block description.
         *
         * @var string
         */
        $this->description = __('A simple Partners block.', 'sage');

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
        $this->mode = 'edit';

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
            'mode' => false,
            'multiple' => true,
            'jsx' => true,
        ];

        /**
         * The block styles.
         *
         * @var array
         */


        /**
         * The block preview example data.
         *
         * @var array
         */


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
            'partners_title' => $this->partners_title(),
            'partners_subtitle' => $this->partners_subtitle(),
            'partners_slider' => $this->partners_slider(),
            'partners_image' => $this->partners_image(),
            'partners_item_title' => $this->partners_item_title(),
            'partners_link' => $this->partners_link(),

        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $partners = new FieldsBuilder('partners');

        $partners
            ->addText('partners_title', [
                'label' => 'Заголовок',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '',
                ],
            ])
            ->addText('partners_subtitle', [
                'label' => 'Подзаголовок',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '',
                ],
            ])
            ->addRepeater('partners_list', [
                'label' => 'Список партнеров',
                'layout' => 'table',
                'min' => 0,
                'max' => 0,
                'button_label' => '',
            ])

            ->addImage('partners_image', [
                'label' => 'Изображение',
                'wrapper' => [
                    'width' => '50',
                ],
                'return_format' => 'id',
                'preview_size' => 'thumbnail',
            ])
            ->addText('partners_item_title', [
                'label' => 'Заголовок',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '50',
                ],
            ])
            ->endRepeater()

            ->addText('partners_link', [
                'label' => 'Url ссылки',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '50',
                ],
            ]);

            // ->addPageLink('partners_link', [
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

        return $partners->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function partners_title()
    {
        return get_field('partners_title');
    }

    public function partners_subtitle()
    {
        return get_field('partners_subtitle');
    }

    public function partners_slider()
    {
        return get_field('partners_slider');
    }

    public function partners_image()
    {
        return get_field('partners_image');
    }

    public function partners_item_title()
    {
        return get_field('partners_item_title');
    }

    public function partners_link()
    {
        return get_field('partners_link');
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
