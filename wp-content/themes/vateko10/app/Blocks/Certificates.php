<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Roots\Acorn\Application;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Certificates extends Block
{
    public function __construct(Application $app)
    {
        /**
         * The block name.
         *
         * @var string
         */
        $this->name = __('Сертификаты качества', 'sage');

        /**
         * The block slug.
         *
         * @var string
         */
        $this->slug = 'certificates';

        /**
         * The block description.
         *
         * @var string
         */
        $this->description = __('A simple Certificates block.', 'sage');

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
            'certificates_title' => $this->certificates_title(),
            'certificates_slider' => $this->certificates_slider(),
            'certificates_image' => $this->certificates_image(),
            'certificates_item_title' => $this->certificates_item_title(),
            'certificates_text' => $this->certificates_text(),

        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $certificates = new FieldsBuilder('certificates');

        $certificates
            ->addText('certificates_title', [
                'label' => 'Заголовок',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '',
                ],
            ])
            ->addRepeater('certificates_slider', [
                'label' => 'Слайдер',
                'layout' => 'table',
                'min' => 0,
                'max' => 0,
                'button_label' => '',
            ])
            ->addImage('certificates_image', [
                'label' => 'Изображение',
                'wrapper' => [
                    'width' => '20',
                ],
                'return_format' => 'id',
                'preview_size' => 'thumbnail',
            ])
            ->addText('certificates_item_title', [
                'label' => 'Заголовок',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '40',
                ],
            ])
            ->addTextarea('certificates_text', [
                'label' => 'Текст',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '40',
                    'class' => '',
                    'id' => '',
                ],
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '2',
                'new_lines' => 'br', // Possible values are 'wpautop', 'br', or ''.
            ])
            ->endRepeater();

        return $certificates->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function certificates_title()
    {
        return get_field('certificates_title');
    }

    public function certificates_slider()
    {
        return get_field('certificates_slider');
    }

    public function certificates_image()
    {
        return get_field('certificates_image');
    }

    public function certificates_item_title()
    {
        return get_field('certificates_item_title');
    }

    public function certificates_text()
    {
        return get_field('certificates_text');
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
