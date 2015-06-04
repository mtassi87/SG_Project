<?php
/**
 * Social Gaming
 * Copyright © 2015 Social Gaming
 */
class RuntimeCache {

    /**
     *
     * @var Array holds all "cached" Informations
     */
    static $data = array();

    /**
     * Removes an item
     *
     * @param type $key
     */
    static public function Remove($key) {
        if (isset(self::$data[$key]))
            unset(self::$data[$key]);
    }

    /**
     * Returns an item
     *
     * @param type $key
     * @return mixed is the cached object
     */
    static public function get($key) {
        if (isset(self::$data[$key]))
            return self::$data[$key];

        return false;
    }

    /**
     * Sets an new item
     *
     * @param type $key
     * @param mixed $value
     */
    static public function set($key, $val) {
        self::$data[$key] = $val;
    }

}

?>
