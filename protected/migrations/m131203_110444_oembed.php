<?php

/**
 * Social Gaming
 * Copyright © 2015 Social Gaming
 */
class m131203_110444_oembed extends EDbMigration {

    public function up() {
        $this->createTable('url_oembed', array(
            'url' => 'varchar(255) NOT NULL',
            'preview' => 'text NOT NULL',
            'PRIMARY KEY (`url`)'
        ));

        $this->renameColumn('post', 'message', 'message_2trash');
        $this->renameColumn('post', 'original_message', 'message');
    }

    public function down() {
        echo "m131203_110444_oembed does not support migration down.\n";
        return false;
    }

    /*
      // Use safeUp/safeDown to do migration with transaction
      public function safeUp()
      {
      }

      public function safeDown()
      {
      }
     */
}
