<?php

/**
 * Social Gaming
 * Copyright © 2015 Social Gaming
 */
class HActiveForm extends CActiveForm
{

    /**
     * Renders a datetime field for a model attribute.
     * 
     * Utilizes bootstrap-datetimepicker.js
     * @param CModel $model the data model
     * @param string $attribute the attribute
     * @param array $htmlOptions additional HTML attributes.
     * @param array $fieldOptions additional picker attributes. (see HHTML::activeDateTimeField)
     * 
     * @return string the generated input field
     */
    public function dateTimeField($model, $attribute, $htmlOptions = array(), $fieldOptions = array())
    {
        return HHtml::activeDateTimeField($model, $attribute, $htmlOptions, $fieldOptions);
    }

}
