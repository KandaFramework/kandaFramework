<?php

namespace modules\kanda;

use base\ActiveModule;

class Module extends ActiveModule{
    
    public function begin() {
         return __NAMESPACE__;
    }
}