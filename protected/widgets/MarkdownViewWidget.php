<?php

/**
 * Social Gaming
 * Copyright © 2015 Social Gaming
 */
class MarkdownViewWidget extends HWidget
{

    /**
     * Markdown to parse
     * 
     * @var string
     */
    public $markdown = "";

    /**
     * Markdown parser class
     * 
     * @var string
     */
    public $parserClass = "HMarkdown";

    /**
     * Purify output after parsing
     * 
     * @var boolean
     */
    public $purifyOutput = true;

    /**
     * Stylesheet for Highlight.js
     */
    public $highlightJsCss = "github";

    public function init()
    {
        if (!Helpers::CheckClassType($this->parserClass, "cebe\markdown\Parser")) {
            throw new CException("Invalid markdown parser class given!");
        }

        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/resources/highlight.js/highlight.pack.js');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/resources/highlight.js/styles/' . $this->highlightJsCss . '.css');
        Yii::app()->clientScript->registerScript("highlightJs", '$("pre code").each(function(i, e) { hljs.highlightBlock(e); });');
    }

    public function run()
    {
        $this->markdown = CHtml::encode($this->markdown);

        $parserClass = $this->parserClass;

        $parser = new $parserClass;
        $html = $parser->parse($this->markdown);

        if ($this->purifyOutput) {
            $purifier = new CHtmlPurifier();
            $html = $purifier->purify($html);
        }

        $this->render('markdownView', array('content' => $html));
    }

}
