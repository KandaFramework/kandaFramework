<?php
/**
 * 
 * 
 * @copyright (c) KandaFramework
 * @access public
 * 
 */
namespace base;

class Url{
    
    public static  $server_name = '';

    public static $home;

    protected static $url;

    protected static $baseUrl;

    protected static $base;


    public static function segment($arg=null)
    {
        $url = $_SERVER['REQUEST_URI'];
        if($_SERVER['SERVER_NAME'] == 'localhost'){

            self::$server_name =   basename(getcwd()).'/';
          $url = substr($_SERVER['REQUEST_URI'],strlen(self::$server_name));

        }      
        if(isset($_GET))
        {
            $url = explode('?',$url);
            $url = $url[0];
        }

        $url = explode('/', trim($url, '/'));


        if($arg==null)
        {
            return end($url);
        }
        else
        {
            array_unshift($url, null);
            unset($url[0]);
            if(isset($url[$arg]))
            {
                return $url[$arg];
            }
            else
            {
                return null;
            }
        }
    }

    /**
     * @access public
     *
     * @param string $url
     *
     * @description Montar a url.
     * Caso não tenha valor no parametro, serar chamado a url base exp: http://kandaframework.com
     *
     * @return string Retonar a url
     *
     */
    public function createUrl($url = '') {

        if (!empty($url)) {

            return $this->baseUrl() . '/' . $url;
        }

        self::$home = $this->baseUrl();

        return self::$home;
    }

    /**
     * @access public
     *
     * @description Monta a url base do framework
     *
     * @return string
     */
    public function baseUrl() {
 
        $server_name = $_SERVER['SERVER_NAME'];

        $protocolo = (strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === false) ? 'http' : 'https';

        if ($_SERVER['SERVER_NAME'] == 'localhost') {

            $serName = explode('/', $_SERVER['REQUEST_URI']);

            $server_name = $_SERVER['SERVER_NAME'] . '/' . $serName[1];
        }
         
        if(php_sapi_name() === 'cli-server')
            return  self::$home =  $protocolo . '://'.$_SERVER['HTTP_HOST'];

        self::$home = $protocolo . '://' . $server_name . ALIAS;

        return self::$home;
    }

    /**
     * 
     * @access public
     * 
     * @param string $view Nome da view
     * @param array $param Parametros a ser passado na url
     * 
     * @example $this->redirect('index',['id'=>1]); 
     * 
     * @description Redirecionar para uma view. Referencia da url serar herdada

     * 
     */
    public function redirect($view = '', $param = []) {

        $queryString = '';

        if (!empty($param)) {

            $queryString = '/';
            $i = 0;
            $cont = '';

            foreach ($param as $key => $value) {

                if ($i > 0)
                    $cont = "/";

                $queryString .= "{$cont}$value";

                ++$i;
            }
        }

        $header = $this->baseUrl() . '/' . self::$theme . '/' . self::$view . '/' . $view . $queryString;

        if (empty($view)) {
            $header = $this->baseUrl() . '/' . self::$theme . '/' . self::$view . $queryString;
        }


        header("Location:$header");
        exit;
    }


    public function Formart($string) {


        $map = array(
            'á' => 'a', 'à' => 'a', 'ã' => 'a', 'â' => 'a',
            'é' => 'e', 'ê' => 'e', 'í' => 'i', 'ó' => 'o',
            'ô' => 'o', 'õ' => 'o', 'ú' => 'u', 'ü' => 'u',
            'ç' => 'c', 'Á' => 'a', 'À' => 'a', 'Ã' => 'a',
            'Â' => 'a', 'É' => 'e', 'Ê' => 'e', 'Í' => 'i',
            'Ó' => 'o', 'Ô' => 'o', 'Õ' => 'o',
            'Ú' => 'u', 'Ü' => 'u', 'Ç' => 'c', '?' => '()');
        $str = str_replace(' ', '-', strtolower($string));
        return strtr($str, $map);
    }
 }