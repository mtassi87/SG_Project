<?php

/**
 * Social Gaming
 * Copyright © 2015 Social Gaming
 */
class HConsoleCommand extends CConsoleCommand
{

    /**
     * Inits the command and prepares the base environment.
     */
    public function init()
    {

        Yii::app()->interceptor->intercept($this);

        Yii::import('application.vendors.*');

        EZendAutoloader::$prefixes = array('Zend', 'Custom');
        Yii::import("ext.yiiext.components.zendAutoloader.EZendAutoloader", true);
        Yii::registerAutoloader(array("EZendAutoloader", "loadClass"), true);

        ini_set('max_execution_time', 9000);
        ini_set('memory_limit', '1024M');
        date_default_timezone_set("Europe/Berlin");

        error_reporting(E_ALL ^ E_NOTICE);

        #HSetting::InstallBase();
    }

    /**
     * Prints out the console application header
     *
     * @param String $title is the title of the command
     */
    protected function printHeader($title)
    {

        print "


                     HumHub Console Interface - Version 1

--------------------------------------------------------------------------------
$title
--------------------------------------------------------------------------------\n
\n";
    }

    protected function printLine()
    {
        print "\n--------------------------------------------------------------------------------\n";
    }

}

?>
