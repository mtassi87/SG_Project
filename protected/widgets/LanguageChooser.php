<?php

/**
 * Social Gaming
 * Copyright © 2015 Social Gaming
 */
class LanguageChooser extends HWidget
{

    /**
     * Displays / Run the Widget
     */
   public function run()
    {
       $model = new ChooseLanguageForm();
        $model->language = Yii::app()->getLanguage();
        $this->render('languageChooser', array('model' => $model, 'languages' => Yii::app()->params['availableLanguages']));
    }

}
