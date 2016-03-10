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
    use TranslateTrait;

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
        $this->registerTranslations();

        //Toolbar
        $toolbar = [
            '{export}',
            '{toggleData}',
        ];

        $view = $this->getView();

        $basic_toolbar = [
            ['content' =>
                Html::a('<i class="glyphicon glyphicon-plus"></i> ' . self::t('toolbar', 'Add'), ['update'], ['data-pjax' => 0, 'title' => 'Add Pages', 'class' => 'btn btn-success']) . ' ' .
                Html::a('<i class="glyphicon glyphicon-repeat"></i> ' . self::t('toolbar', 'Refresh'), ['index'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => 'Reset Grid'])
            ],
        ];

        if(array_key_exists('category_id', $this->filterModel->attributes)){
            array_push($basic_toolbar,
                [
                    'content' =>
                        Html::a('<i class="glyphicon glyphicon-list"></i> ' . self::t('toolbar', 'Categories'), ['news-category/list'], ['data-pjax' => 0, 'title' => 'Categories', 'class' => 'btn btn-default'])
                ]
            );
        }

        if($this->filterModel->hasAttribute($this->filterModel->removedAttribute)){
            array_push($basic_toolbar,
                [
                    'content' =>
                        Html::a(
                            '<i class="glyphicon glyphicon-trash"></i> ' . self::t('toolbar', 'In Trash'),
                            ['trash'],
                            ['data-pjax' => 0, 'title' => 'Removed records', 'class' => 'btn btn-default'])
                ]
                );
        }


        if ($view->context->action->id === 'trash') {
            $basic_toolbar = [
                [
                    'content' =>
                        Html::a(
                            '<i class="glyphicon glyphicon-arrow-left"></i> ' . self::t('toolbar', 'Back to Records'),
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
