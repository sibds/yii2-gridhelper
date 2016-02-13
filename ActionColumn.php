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
                    'title' => self::t('yii', 'View'),
                    'aria-label' => self::t('yii', 'View'),
                    'data-pjax' => '0',
                ], $this->buttonOptions);
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
            };
        }
        */
        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => self::t('message', 'Update'),
                    'aria-label' => self::t('message', 'Update'),
                    'data-pjax' => '0',
                ], $this->buttonOptions);
                return Html::a(Icon::show('pencil', [], Icon::FA), $url, $options);
            };
        }
        if (!isset($this->buttons['copy'])) {
            $this->buttons['copy'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => self::t('message', 'Copy'),
                    'aria-label' => self::t('message', 'Copy'),
                    'data-pjax' => '0',
                ], $this->buttonOptions);
                return Html::a(Icon::show('copy', [], Icon::FA), $url, $options);
            };
        }
        if (!isset($this->buttons['lock'])) {
            $this->buttons['lock'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => self::t('message', 'Lock'),
                    'aria-label' => self::t('message', 'Lock'),
                    'data-pjax' => '0',
                ], $this->buttonOptions);
                return Html::a(Icon::show('copy', [], Icon::FA), $url, $options);
            };
        }
        if (!isset($this->buttons['unlock'])) {
            $this->buttons['unlock'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => self::t('message', 'Unlock'),
                    'aria-label' => self::t('message', 'Unlock'),
                    'data-pjax' => '0',
                ], $this->buttonOptions);
                return Html::a(Icon::show('copy', [], Icon::FA), $url, $options);
            };
        }
        if (!isset($this->buttons['restore'])) {
            $this->buttons['restore'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => self::t('message', 'Restore'),
                    'aria-label' => self::t('message', 'Restore'),
                    'data-confirm' => self::t('message', 'Are you sure you want to restore this item?'),
                    'data-method' => 'post',
                    'data-pjax' => '0',
                ], $this->buttonOptions);
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
            };
        }
        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url, $model, $key) {
                $name = $model->hasAttribute('removed')?self::t('message', 'To trash'):self::t('message', 'Delete');
                $options = array_merge([
                    'title' => $name,
                    'aria-label' => $name,
                    'data-confirm' => self::t('message', 'Are you sure you want to delete this item?'),
                    'data-method' => 'post',
                    'data-pjax' => '0',
                ], $this->buttonOptions);
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
            };
        }
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return \Yii::t('sibds/grid/' . $category, $message, $params, $language);
    }
}