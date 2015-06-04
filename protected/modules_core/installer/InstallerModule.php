<?php

/**
 * Social Gaming
 * Copyright © 2015 Social Gaming
 */
class InstallerModule extends HWebModule
{

    public $isCoreModule = true;
    private $_assetsUrl;

    public function getAssetsUrl()
    {
        if ($this->_assetsUrl === null)
            $this->_assetsUrl = Yii::app()->getAssetManager()->publish(
                    Yii::getPathOfAlias('installer.resources')
            );
        return $this->_assetsUrl;
    }

    public function init()
    {
        $this->setLayoutPath(Yii::getPathOfAlias('installer.views'));
        Yii::app()->clientScript->registerCoreScript('jquery');
    }

    /**
     * Checks if database connections works
     *
     * @return boolean
     */
    public function checkDBConnection()
    {
        try {
            // call setActive with true to open connection.
            Yii::app()->db->setActive(true);
            // return the current connection state.
            return Yii::app()->db->getActive();
        } catch (Exception $e) {
            
        }

        return false;
    }

    /**
     * Checks if the application is already configured.
     */
    public function isConfigured()
    {
        if (HSetting::Get('secret') != "") {
            return true;
        }
        return false;
    }

    /**
     * Sets application in installed state (disables installer)
     */
    public function setInstalled()
    {
        $config = HSetting::getConfiguration();
        $config['params']['installed'] = true;
        HSetting::setConfiguration($config);
    }

}
