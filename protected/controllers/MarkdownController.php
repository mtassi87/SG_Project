<?php

/**
 * Social Gaming
 * Copyright © 2015 Social Gaming
 */
class MarkdownController extends Controller
{

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionPreview()
    {
        $this->forcePostRequest();
        return $this->widget('application.widgets.MarkdownViewWidget', array('markdown' => Yii::app()->request->getParam('markdown')));
    }

}
