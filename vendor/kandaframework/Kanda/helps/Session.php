<?php

/**
 * 
 * 
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace helps;

@session_start();

class Session {

    public $_setSession = [];

    public static function run() {
        return new Session([]);
    }

    public function __construct($session) {

        if (!empty($session)) {
            $this->_setSession = (object) $session;
            return $this->_setSession;
        }
    }

    public static function setSession($param) {

        if (!empty($param)) {

            foreach ($param as $key => $value) {

                $_SESSION['set'][$key] = $value;
            }

            return new Session($_SESSION['set']);
        } else {
            throw new \Exception('Deve conter um valor!');
        }
    }

    public static function getSession() {

        if (!empty($_SESSION['set']))
            return (object) $_SESSION['set'];
        elseif(!empty($_SESSION))
            return (object) $_SESSION;
        else
            return (object) $_SESSION;
    }

    public static function clear($key = '') {

        if (!empty($key)) {
            unset($_SESSION['set'][$key]);
            return '';
        } else {
            session_destroy();
            unset($_SESSION['set']);
        }
    }

    /**
     * 
     * @param type $key
     * @param type $message
     * @param type $type
     */
    public static function setflash($key, $message, $type = 'success') {

        $_SESSION[$key] = $key;
        $_SESSION['message'][$key] = $message;
        $_SESSION['type'][$key] = $type;
    }

    /**
     * 
     * @param type $key
     * @param type $content
     * @param type $type
     */
    public static function creatflash($key, $content, $type = 'success') {

        $_SESSION[$key] = $key;
        $_SESSION['content'][$key] = $content;
    }

    /**
     * 
     * @param type $key Chave para gerar a session
     * @param type $layout Apresentação da mensagem, top ou bottom
     * @return string 
     */
    public static function getflash($key) {
        $script = '';
        if (isset($_SESSION[$key]) && $_SESSION[$key] == $key) {
           
           $setFlash = \Kanda::$param->setFlash;
           
           //Message | succcess,danger...
           $script = Html::script($setFlash($_SESSION['message'][$key],$_SESSION['type'][$key]));
        }
        unset($_SESSION[$key], $_SESSION['title'][$key], $_SESSION['type'][$key]);
        return $script;
    }

    /**
     * 
     * @param type $key Chave para gerar a session
     * @param type $layout Apresentação da mensagem, top ou bottom
     * @return string 
     */
    public static function getcreatflash($key) {

        if (isset($_SESSION[$key]) && $_SESSION[$key] == $key) {

            $content = $_SESSION['content'][$key];
        }
        unset($_SESSION[$key]);
        return $content;
    }

}
