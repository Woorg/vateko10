<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Roots\Acorn\Application;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Question extends Block
{
    public function __construct(Application $app)
    {
        /**
         * The block name.
         *
         * @var string
         */
        $this->name = __('Задать вопрос менеджеру', 'sage');

        /**
         * The block slug.
         *
         * @var string
         */
        $this->slug = 'question';

        /**
         * The block description.
         *
         * @var string
         */
        $this->description = __('A simple Question block.', 'sage');

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
            'question_title' => $this->question_title(),
            'list' => $this->list(),
            'list_icon' => $this->list_icon(),
            'list_title' => $this->list_title(),
            'list_text' => $this->list_text(),
            'question_shortcode' => $this->question_shortcode(),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $question = new FieldsBuilder('question');

        $question
            ->addText('question_title', [
                'label' => 'Заголовок',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '',
                ],
            ])
            ->addRepeater('list', [
                'label' => 'Контакты',
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
                    'width' => '40',
                ],
            ])
            ->addText('list_text', [
                'label' => 'Текст',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '40',
                ],
            ])
            ->endRepeater()
            ->addText('question_shortcode', [
                'label' => 'Шорткод формы',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '',
                ],
            ]);


        return $question->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function question_title()
    {
        return get_field('question_title');
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

    public function list_text()
    {
        return get_field('list_text');
    }

    public function question_shortcode()
    {
        return get_field('question_shortcode');
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
