<?php

/**
 * Social Gaming
 * Copyright © 2015 Social Gaming
 */

class ActivityModule extends HWebModule
{

    public $isCoreModule = true;

    /**
     * Inits the activity module
     */
    public function init()
    {
        $this->setImport(array(
            'activity.models.*',
            'activity.behaviors.*',
        ));
    }

    /**
     * Formatted the activity content before delivery
     *
     * @param string $text
     */
    public static function formatOutput($text)
    {
        $text = HHtml::translateMentioning($text, false);
        $text = HHtml::translateEmojis($text, false);

        return $text;
    }

}
