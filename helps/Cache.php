<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace helps;

class Cache extends \app\Controller {

    private static $fileName;
    private static $active;

    public static function run(){
        return new Cache();
    }

    public static function setPath($fileName) {

        self::$fileName = $fileName;
    }

    public static function getPath() {

        return self::$fileName;
    }

    public static function loadCache($time, $active = true) {

        date_default_timezone_set('America/Sao_Paulo');

        self::$active = $active;

        if ($active) {
            if (file_exists(self::getPath()) && ( time() - $time * 60 < filemtime(self::getPath()))) {
                echo file_get_contents(self::getPath());
                exit;
            } elseif (file_exists(self::getPath()))
                unlink(self::getPath());
        }
    }

    public static function create($content) {

        if (self::$active) {

            if (!file_exists(self::getPath())) {
                $fp = fopen(self::getPath(), 'w');
                fwrite($fp, $content);
                chmod(self::getPath(), 0777);
            }
        }
    }

}
