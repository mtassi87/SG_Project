<?php

/**
 * Social Gaming
 * Copyright © 2015 Social Gaming
 */
class UploadProfileImageForm extends CFormModel {

    /**
     * @var String uploaded image
     */
    public $image;

    /**
     * Declares the validation rules.
     *
     * @return Array Validation Rules
     */
    public function rules() {
        return array(
            array('image', 'required'),
            array('image', 'file', 'types' => 'jpg, png, jpeg, tiff', 'maxSize' => 3 * 1024 * 1024),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'image' => Yii::t('base', 'New profile image'),
        );
    }

}
