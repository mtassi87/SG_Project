<?php

/**
 * Social Gaming
 * Copyright © 2015 Social Gaming
 */
class UserPostsStreamAction extends BaseStreamAction
{

    public function init()
    {
        parent::init();

        // Build subselect to create a list of user wall_ids
        $wallIdSelectCriteria = new CDbCriteria();
        $wallIdSelectCriteria->select = 'wall_id';

        if (Yii::app()->user->isGuest) {
            $wallIdSelectCriteria->condition = 'visibility=' . User::VISIBILITY_ALL;
        }
        $wallIdSelectSql = User::model()->getCommandBuilder()->createFindCommand(User::model()->getTableSchema(), $wallIdSelectCriteria)->getText();

        $this->criteria->condition .= ' AND wall_entry.wall_id IN (' . $wallIdSelectSql . ')';
        $this->criteria->condition .= " AND content.visibility=" . Content::VISIBILITY_PUBLIC;
    }

}
