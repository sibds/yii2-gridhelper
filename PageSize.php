<?php

namespace sibds\grid;

use yii\bootstrap4\Html;

class PageSize extends \nterms\pagesize\PageSize
{
    use TranslateTrait;

    public $options = [
        'class' => 'form-control'
    ];

    public $label = "Showed";

    public $template = "{label}&nbsp;{list}";

    //public $labelOptions = ['class' => 'col-sm-6 col-form-label'];
    /**
     * Runs the widget and render the output
     */
    public function run()
    {
        if(empty($this->options['id'])) {
            $this->options['id'] = $this->id;
        }

        if($this->encodeLabel) {
            $this->label = Html::encode( self::t('toolbar', $this->label));
        }

        $perPage = !empty($_GET[$this->pageSizeParam]) ? $_GET[$this->pageSizeParam] : $this->defaultPageSize;

        $listHtml = Html::dropDownList($this->pageSizeParam, $perPage, $this->sizes, $this->options);
        $labelHtml = Html::label($this->label, $this->options['id'], $this->labelOptions);

        $output = str_replace(['{list}', '{label}'], [$listHtml, $labelHtml], $this->template);

        return $output;
    }
}