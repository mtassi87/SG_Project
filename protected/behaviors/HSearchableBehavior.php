<?php
/**
 * Social Gaming
 * Copyright © 2015 Social Gaming
 */
class HSearchableBehavior extends HActiveRecordBehavior {

    public function afterSave($event) {

        if ($this->getOwner() instanceof ISearchable) {

            if (!$this->getOwner()->isNewRecord)
                HSearch::getInstance()->deleteModel($this->getOwner());

            HSearch::getInstance()->addModel($this->getOwner());
        }

        parent::afterSave($event);
    }

    public function afterDelete($event) {

        if ($this->getOwner() instanceof ISearchable) {
            HSearch::getInstance()->deleteModel($this->getOwner());
        }

        parent::afterDelete($event);
    }

}

?>