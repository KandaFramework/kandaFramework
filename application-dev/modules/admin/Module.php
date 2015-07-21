<?php

namespace app\modules\admin;

use kanda\base\ActiveModule;

class Module extends ActiveModule{
    
    public function begin() {
         return __NAMESPACE__;
    }
}