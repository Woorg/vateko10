<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class ProductExtra extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $productExtra = new FieldsBuilder('product_extra');

        $productExtra
            ->setLocation('post_type', '==', 'product');

        $productExtra
            ->addText('product_price', [
                'label' => 'Цена',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '',
                ],
            ])
            ->addRepeater('features', [
                'label' => 'Параметры',
                'layout' => 'block',
                'min' => 2,
                'max' => 2,
                'button_label' => '',
            ])
                ->addImage('features_icon', [
                    'label' => 'Иконка',
                    'wrapper' => [
                        'width' => '20',
                    ],
                    'return_format' => 'id',
                    'preview_size' => 'thumbnail',
                ])
                ->addText('features_title', [
                    'label' => 'Название',
                    'instructions' => '',
                    'required' => 0,
                    'wrapper' => [
                        'width' => '40',
                    ],
                ])
                ->addText('features_value', [
                    'label' => 'Значение',
                    'instructions' => '',
                    'required' => 0,
                    'wrapper' => [
                        'width' => '40',
                    ],
                ])

            ->endRepeater()
            ->addText('product_button_url', [
                'label' => 'Url кнопки',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '50',
                ],
            ])
            ->addText('product_button_text', [
                'label' => 'Текст кнопки',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '50',
                ],
            ]);

        return $productExtra->build();
    }
}
