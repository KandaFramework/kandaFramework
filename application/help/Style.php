<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace app\help;

class Style {

    public $classInput = 'input-xlarge focused';
    public $classFile = 'input-file uniform_on';
    public $classTextarea = 'form-control cleditor';
    public $classSelect = 'form-control';
    public $classTable = '';

    public function grid($column, $content, $label) {


        return "<div class='control-group'>
        <label for='$column' class='control-label'>$label</label>
        <div class=\"controls\">
								 $content
		</div>

        </div>";         
    }

    public function table() {
        
    }

}