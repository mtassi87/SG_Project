<?php

/**
 * Social Gaming
 * Copyright © 2015 Social Gaming
 */
class HGuidBehavior extends HActiveRecordBehavior {

    public function beforeValidate($event) {

        if ($this->getOwner()->isNewRecord) {
            if ($this->getOwner()->guid == "") {
                $this->getOwner()->guid = UUID::v4();
            }
        }

        return parent::beforeValidate($event);
    }

}

?>