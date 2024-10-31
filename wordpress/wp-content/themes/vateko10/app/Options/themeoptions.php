<?php

namespace App\Options;

use Log1x\AcfComposer\Options as Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class themeoptions extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Настройки темы';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Настройки темы | Theme Options';

    /**
     * The option page field group.
     *
     * @return array
     */
    public function fields()
    {
        $themeoptions = new FieldsBuilder('Настройки темы');

        $themeoptions
            ->addTab('general', [
                'label' => 'Общие',
            ])
            ->addImage('logo_image', [
                'label' => 'Логотип',
                'return_format' => 'id',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ])
            ->addText('email', [
                'label' => 'Email',
            ])
            ->addText('phone', [
                'label' => 'Телефон',
            ])
            ->addTextarea('copyright', [
                'label' => 'Копирайт',
                'rows' => '2',
                'new_lines' => 'br', // Possible values are 'wpautop', 'br', or ''.
            ])
            ->addFile('presentation', [
                'label' => 'Презентация',
                'return_format' => 'id',
                'library' => 'all',
            ]);

        return $themeoptions->build();
    }
}
