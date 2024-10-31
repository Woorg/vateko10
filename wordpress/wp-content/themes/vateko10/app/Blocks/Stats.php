<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Roots\Acorn\Application;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Stats extends Block
{
    public function __construct(Application $app)
    {
        /**
         * The block name.
         *
         * @var string
         */
        $this->name = __('Ватэко в цифрах', 'sage');

        /**
         * The block slug.
         *
         * @var string
         */
        $this->slug = 'stats';

        /**
         * The block description.
         *
         * @var string
         */
        $this->description = __('A simple Stats block.', 'sage');

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
            'stats_title' => $this->stats_title(),
            // 'stats_list' => $this->stats_list(),
            // 'stats_item_title' => $this->stats_item_title(),
            // 'stats_item_text' => $this->stats_item_text(),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $stats = new FieldsBuilder('stats');

        $stats
            ->addText('stats_title', [
                'label' => 'Заголовок',
            ])
            ->addRepeater( 'stats_list', [
                'label' => 'Список',
                'layout' => 'table',
                'button_label' => '',
            ])
            ->addText('stats_item_title', [
                'label' => 'Заголовок',
            ])
            ->addTextarea('stats_item_text', [
                'label' => 'Описание',
                'rows' => '2',
                'new_lines' => 'br', // Possible values are 'wpautop', 'br', or ''.
            ])
            ->endRepeater();

        return $stats->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function stats_title()
    {
        return get_field('stats_title');
    }

    public function stats_list()
    {
        return get_field('stats_list');
    }

    public function stats_item_title()
    {
        return get_field('stats_item_title');
    }

    public function stats_item_text()
    {
        return get_field('stats_item_text');
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
