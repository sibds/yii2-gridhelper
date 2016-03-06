<?php

namespace sibds\grid;
use kartik\icons\Icon;


/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 13.02.16
 * Time: 17:37
 */

trait TranslateTrait
{
    public function registerTranslations()
    {
        $i18n = \Yii::$app->i18n;
        $i18n->translations['sibds/grid/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@vendor/sibds/yii2-gridhelper/messages',
            'fileMap' => [
                'sibds/grid/messages' => 'messages.php',
                'sibds/grid/toolbar' => 'toolbar.php',
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return \Yii::t('sibds/grid/' . $category, $message, $params, $language);
    }
}
