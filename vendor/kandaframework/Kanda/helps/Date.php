<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace helps;

class Date{
    
    /**
     * 
     * @access public
     * 
     * @param string $date
     * @param string $lang
     * @param string $formart
     * @return string Data formatada
     * 
     * 
     * 
     */
    public function getDate($date = '', $lang = 'us', $formart = '-') {

        if (!empty($date)) {

            if ($lang == 'us') {

                $dt = explode('/', $date);
                return "{$dt[2]}$formart{$dt[1]}$formart{$dt[0]}";
            } elseif ($lang == 'br') {

                $dt = explode('-', $date);
                return "{$dt[0]}$formart{$dt[1]}$formart{$dt[2]}";
            }
        }
        return $date;
    }
}