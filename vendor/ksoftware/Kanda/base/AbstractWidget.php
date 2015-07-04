<?php
/**
 * Created by PhpStorm.
 * User: thiago
 * Date: 27/05/15
 * Time: 09:27
 */

namespace base;


abstract class AbstractWidget {

  public static $table;

  abstract  public static function widget($param);

  abstract protected static function createActionColumns($action, $param, $id);

}