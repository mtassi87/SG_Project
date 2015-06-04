<?php

/**
 * Social Gaming
 * Copyright © 2015 Social Gaming
 */
class HDbTestCase extends CDbTestCase
{

    protected function setUp()
    {
        parent::setUp();
        Yii::app()->cache->flush();
        RuntimeCache::$data = array();

        $this->becomeUser('User1');
    }

    public function becomeUser($username)
    {
        Yii::import('application.modules_core.user.components.*');
        $newIdentity = new UserIdentity($username, '');
        $newIdentity->fakeAuthenticate();

        Yii::app()->user->setId($newIdentity->getId());
        Yii::app()->user->setName($newIdentity->getName());
        Yii::app()->user->reload();
    }

}
