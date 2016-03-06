<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 07.03.16
 * Time: 1:46
 */

namespace sibds\grid;

use yii\helpers\Html;


class GridView extends \kartik\grid\GridView
{
    public $containerOptions = ['style' => 'overflow: auto']; // only set when $responsive = false
    public $headerRowOptions = ['class' => 'kartik-sheet-style'];
    public $filterRowOptions = ['class' => 'kartik-sheet-style'];

    public $pjax = true; // pjax is set to always true for this demo

    // set export properties
    public $export = [
        'fontAwesome' => true
    ];

    // parameters from the demo form
    public $bordered = true;
    public $striped = false;
    public $condensed = true;
    public $responsive = true;
    public $hover = true;
    public $showPageSummary = false;
    public $panel = [
        //'type' => GridView::TYPE_PRIMARY,
        'heading' => false,//$this->title,
    ];
    public $persistResize = false;

    public function init()
    {
        //Toolbar
        $toolbar = [
            '{export}',
            '{toggleData}',
        ];

        $view = $this->getView();

        $basic_toolbar = [
            ['content' =>
                Html::a('<i class="glyphicon glyphicon-plus"></i> Добавить', ['update'], ['data-pjax' => 0, 'title' => 'Add Pages', 'class' => 'btn btn-success']) . ' ' .
                Html::a('<i class="glyphicon glyphicon-repeat"></i> Обновить', ['index'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => 'Reset Grid'])
            ],
            [
                'content' =>
                    Html::a('<i class="glyphicon glyphicon-list"></i> Категории', ['news-category/list'], ['data-pjax' => 0, 'title' => 'Add Pages', 'class' => 'btn btn-default'])
            ],
            [
                'content' =>
                    Html::a(
                        '<i class="glyphicon glyphicon-trash"></i> Корзина',
                        ['trash'],
                        ['data-pjax' => 0, 'title' => 'Removed records', 'class' => 'btn btn-default'])
            ]
        ];

        if($view->context->action->id === 'trash'){
            $basic_toolbar = [
                [
                    'content' =>
                        Html::a(
                            '<i class="glyphicon glyphicon-arrow-left"></i> Вернуться к записям',
                            ['list'],
                            ['data-pjax' => 0, 'title' => 'List records', 'class' => 'btn btn-default'])
                ]
            ];
        }
        $toolbar = \yii\helpers\ArrayHelper::merge($basic_toolbar, $toolbar);

        $this->toolbar = $toolbar;

        return parent::init(); // TODO: Change the autogenerated stub
    }
}