<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace help;

use helps\UploadFile;
use wideImage\WideImage;

class Image extends UploadFile {

    public static function dir($name) {

        parent::CreateDir(WWW_ROOT . '/images/' . $name);

        parent::CreateDir(WWW_ROOT . '/images/' . $name . '/big');
        parent::CreateDir(WWW_ROOT . '/images/' . $name . '/small');
    }

    public static function create($config = []) {

        if (!empty($config)) {

            if (!empty($config['tmpName'])) {

                $dirName = $config['dirName'];

                $rensize = WideImage::load($config['tmpName']);

                self::dir($dirName);

                chmod($dirName, 0777);

                $big = WWW_ROOT . '/images/' . $dirName . '/big/' . $config['name'];
                $small = WWW_ROOT . '/images/' . $dirName . '/small/' . $config['name'];


                $im = imagecreatefromstring($rensize->resize(370, 281));
                imagejpeg($im, $small);
                $imb = imagecreatefromstring($rensize->resize(767, 511));
                imagejpeg($imb, $big);

                chmod($small, 0777);
                chmod($big, 0777);
            }
        } else
            return '';
    }

    public static function update($config = []) {

        if (!empty($config)) {

            self::delete($config);
            self::create($config);
        }
    }

    public static function delete($config = []) {

        if (!empty($config)) {

            $dirName = $config['dirName'];
            $big = WWW_ROOT . '/images/' . $dirName . '/big/' . $config['name'];
            $small = WWW_ROOT . '/images/' . $dirName . '/small/' . $config['name'];

            if (file_exists($small) && file_exists($big)) {
                unlink($small);
                unlink($big);
            } else
                return '';
        }
    }

    public static function deleteDir($dirName) {

        $dir = WWW_ROOT . '/images/' . $dirName;

        $files = array_diff(scandir($dir), array('.', '..'));

        if (is_dir($dir)) {

            foreach ($files as $file) {
                if (file_exists("$dir/$file"))
                    (is_dir("$dir/$file")) ? self::deleteDir("$dirName/$file") : unlink("$dir/$file");
            }
            return rmdir($dir);
        }else
            return '';
    }

}
