<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace helps;

class Bootstrap {
    
    /**
     * 
     * @param type $li
     * @param type $previous
     * @param type $next
     * @return string
     */
    public static function pagination($li,$previous='Voltar',$next='Proximo') {

        $tag = " <ul class='pagination'>
            <li>
                <a href='#' aria-label='Previous'><span aria-hidden='true'>$previous</span></a>
            </li>
                $li
            <li>
            <a href='#' aria-label='Next'>
            <span aria-hidden='true'>$next</span>
        </a>
        </li>
        </ul>
        </nav>";
        return $tag;
    }

}
