<?php

/**
 * Social Gaming
 * Copyright © 2015 Social Gaming
 */
class AdminModule extends HWebModule
{

    public $isCoreModule = true;

    /**
     * Should the marketplace be enabled
     * 
     * @var boolean
     */
    public $marketplaceEnabled = true;

    /**
     * URL to HumHub Marketplace API
     * 
     * @var string
     */
    public $marketplaceApiUrl = "https://www.humhub.com/api/v1/modules/";

    /**
     * Enforce valid marketplace ssl certificate
     * 
     * @var boolean
     */
    public $marketplaceApiValidateSsl = true;

    public function init()
    {
        $this->setImport(array(
            'admin.models.*',
            'admin.forms.*',
            'admin.libs.*',
            'admin.*',
        ));
    }

}
