Helpers for GridView
====================
Helper classes for [kartik-v/yii2-grid](http://demos.krajee.com/grid)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist sibds/yii2-gridhelper "*"
```

or add

```
"sibds/yii2-gridhelper": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'class' => 'sibds\grid\UrlColumn',
                'attribute'=>'id',
            ],
            [
                'class' => 'sibds\grid\UrlColumn',
                'attribute'=>'name',
            ],
            [
                'class' => 'sibds\grid\UrlColumn',
                'attribute'=>'url',
            ],
            ...,

            ['class' => 'sibds\grid\ActionColumn'],
        ],```
