<?php

/**
 * Social Gaming
 * Copyright © 2015 Social Gaming
 */
class Optimize extends HConsoleCommand {

    public function run($args) {

        $this->printHeader('Search Index Optimizer');


        print "- Optimizing ...\n";
        HSearch::getInstance()->optimize();
        print "- Search Index successfully optimized!\n";

        print "\n";
    }

}
