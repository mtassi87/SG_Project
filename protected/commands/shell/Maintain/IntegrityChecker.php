<?php

/**
 * Social Gaming
 * Copyright © 2015 Social Gaming
 */
class IntegrityChecker extends HConsoleCommand
{

    public $simulate = false;

    /**
     * Runs Integrity Checker
     *
     * @param type $args
     */
    public function run($args)
    {

        $this->printHeader('Integrity Checker');

        if ($this->simulate) {
            print "Simulation Mode!\n\n";
        }

        $this->doBaseTasks();

        if ($this->hasEventHandler('onRun'))
            $this->onRun(new CEvent($this));

        print "\n\n";
        print "Finished! Integrity Check done!\n\n";
    }

    /**
     * Do general tasks used application whide
     */
    protected function doBaseTasks()
    {

        $this->showTestHeadline("Checking application base structure");

        if (HSetting::Get('secret') == "" || HSetting::Get('secret') == null) {
            HSetting::Set('secret', UUID::v4());
            $this->showFix('Setting missing application secret!');
        }
    }

    /**
     * onRun Event is used to notify modules.
     *
     * @param type $event
     */
    public function onRun($event)
    {
        $this->raiseEvent('onRun', $event);
    }

    /**
     * Shows a headline in console
     * @param type $title
     */
    public function showTestHeadline($title)
    {
        print "*** " . $title . "\n";
    }

    /**
     * Use this method to show a fix
     * @param string $msg
     */
    public function showFix($msg)
    {
        print "\t" . $msg . "\n";
    }

    /**
     * Use this method to show a warning
     * 
     * @since 0.11.2
     * @param string $msg
     */
    public function showWarning($msg)
    {
        print "\tWARNING: " . $msg . "\n";
    }

}
