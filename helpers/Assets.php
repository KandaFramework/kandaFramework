<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace kanda\helpers;

class Assets {

    public $base = '/assets/';
    public $basename = '';
    public $css = [];
    public $js = [];
    public $dirname = '';
    public $assets = [];
    public static $key = '';

    public function init() {

        if (!empty($this->css)) {
            static::$key = 'css';
            $this->Copy($this->css);
        }

        if (!empty($this->js)) {
            static::$key = 'js';
            $this->Copy($this->js);
        }


        return $this;
    }

    private function Copy($files) {

        $src = [];

        $this->createDir($this->basename);

        $path = realpath($this->base);

        $count = strlen($this->base);

        $objects = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path), \RecursiveIteratorIterator::SELF_FIRST);

        $i = 0;

        $count_file = count($files);

        foreach ($objects as $path) {

            if (in_array(substr($path->getPathName(), $count), $files)) {


                $dir = explode(DS, $path->getPathName());
                $filename = end($dir);
                array_pop($dir);

                $newdir = implode(DS, $dir);

                $newdir = substr($newdir, $count);

                $new = $this->basename . DS . $newdir;

                $this->createDir($new);

                $copy = $this->dirName() . $newdir . DS . $filename;

                copy($path->getPathName(), $copy);
            }

            ++$i;
        }

        $reduce = function($recude, $src) {
            $this->assets[static::$key][] = '/assets/' . $this->basename . '/' . $src;
        };
        array_reduce($files, $reduce, null);


        static::createAssets($this->assets);
        return true;
    }

    static function createAssets($src) {
        $type = static::$key;

        Session::setSession([
            'assets' => $src,
        ]);
        return true;
    }

    public function dirName() {
        return ASSETS . $this->basename . DS;
    }

    public function createDir($dirname) {

        $dirname = ASSETS . $dirname;

        if (!is_dir($dirname))
            mkdir($dirname);

        return $dirname;
    }

    static function end($end = '') {

        return $end;
    }

}
