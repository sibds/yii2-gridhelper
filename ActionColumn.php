<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 13.02.16
 * Time: 15:27
 */

namespace sibds\grid;


use kartik\icons\Icon;

class ActionColumn extends \yii\grid\ActionColumn
{
    public $template = '{update} {copy} {lock}{unlock} {restore}{delete}';

    /**
     * Initializes the default button rendering callbacks.
     */
    protected function initDefaultButtons()
    {
        /* TODO: Add support!
        if (!isset($this->buttons['view'])) {
            $this->buttons['view'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('yii', 'View'),
                    'aria-label' => Yii::t('yii', 'View'),
                    'data-pjax' => '0',
                ], $this->buttonOptions);
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
            };
        }
        */
        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('message', 'Update'),
                    'aria-label' => Yii::t('message', 'Update'),
                    'data-pjax' => '0',
                ], $this->buttonOptions);
                return Html::a(Icon::show('pencil', [], Icon::FA), $url, $options);
            };
        }
        if (!isset($this->buttons['copy'])) {
            $this->buttons['copy'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('message', 'Copy'),
                    'aria-label' => Yii::t('message', 'Copy'),
                    'data-pjax' => '0',
                ], $this->buttonOptions);
                return Html::a(Icon::show('copy', [], Icon::FA), $url, $options);
            };
        }
        if (!isset($this->buttons['lock'])) {
            $this->buttons['lock'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('message', 'Update'),
                    'aria-label' => Yii::t('message', 'Update'),
                    'data-pjax' => '0',
                ], $this->buttonOptions);
                return Html::a(Icon::show('copy', [], Icon::FA), $url, $options);
            };
        }
        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('message', 'Delete'),
                    'aria-label' => Yii::t('message', 'Delete'),
                    'data-confirm' => Yii::t('message', 'Are you sure you want to delete this item?'),
                    'data-method' => 'post',
                    'data-pjax' => '0',
                ], $this->buttonOptions);

                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
            };
        }
    }
}