<?php

/**
 * Social Gaming
 * Copyright © 2015 Social Gaming
 */
class Rebuilder extends HConsoleCommand {

    public function run($args) {

        $this->printHeader('Rebuild Search Index\n');

        print "Deleting old index files: ";
        HSearch::getInstance()->flushIndex();
        print " done!\n";

        print "Rebuilding index: ";
        HSearch::getInstance()->rebuild();
        print " done!\n";

        print "\n";
    }

}
