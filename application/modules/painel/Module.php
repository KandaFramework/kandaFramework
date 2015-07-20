<?php

namespace app\modules\painel;

use kanda\base\ActiveModule;

class Module extends ActiveModule{
    
    public function begin() {
         return __NAMESPACE__;
    }
}