<?php
/**
 * Social Gaming
 * Copyright © 2015 Social Gaming
 */
class ReorderContentWidget extends HWidget {

	public $containerClassName;
	public $sortableItemClassName;
	public $url;
	public $additionalAjaxParams;
	
    public function run() {
    	$assetPrefix = Yii::app()->assetManager->publish(dirname(__FILE__) . '/resources', true, 0, defined('YII_DEBUG'));
    	Yii::app()->clientScript->registerScriptFile($assetPrefix . '/jquery-ui-core-int.min.js');
        $this->render('reorderContent', array(
        	'containerClassName' => $this->containerClassName,
        	'sortableItemClassName' => $this->sortableItemClassName,
        	'url' => $this->url,
        	'additionalAjaxParams' => $this->additionalAjaxParams,
        ));
    }

}

?>