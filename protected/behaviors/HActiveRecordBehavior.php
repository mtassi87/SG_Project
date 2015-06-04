<?php

/**
 * Social Gaming
 * Copyright © 2015 Social Gaming
 */
class HActiveRecordBehavior extends CActiveRecordBehavior
{

    /**
     * On after construct event of an active record
     *
     * @param type $event
     */
    public function afterConstruct($event)
    {

        // Intercept this controller
        Yii::app()->interceptor->intercept($this);

        parent::afterConstruct($event);
    }

}

?>
