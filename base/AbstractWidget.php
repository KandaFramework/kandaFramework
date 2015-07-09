<?php
/**
 * Created by PhpStorm.
 * User: thiago
 * Date: 27/05/15
 * Time: 09:27
 */

namespace kanda\base;


abstract class AbstractWidget {
 
  abstract  public static function class_name();

  abstract  public function begin($name,$value,$param);

 
}