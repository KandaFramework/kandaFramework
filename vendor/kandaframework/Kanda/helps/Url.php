<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace helps;

use base\Url as UrlBase;

class Url extends UrlBase{

    public static function run() {
        return new Url();
    } 
}