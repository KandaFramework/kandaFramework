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

    private static $url;

    protected static $baseUrl;

    protected static $base;

    static function getCount(){
        return count(static::$url);
    }

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

        array_filter($url);

        static::$url = $url;

        if($arg==null)
        {
            return end($url);
        }
        else
        {
            array_unshift($url, null);

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
    public static function createUrl($url = '') {

        if (!empty($url)) {

            return static::baseUrl() . '/' . $url;
        }
        return static::baseUrl();
    }

    /**
     * @access public
     *
     * @description Monta a url base do framework
     *
     * @return string
     */
    public static function baseUrl() {
 
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
    public static function redirect($render = '', $param = []) {

        $queryString = '';

        if (!empty($param)) {

            $queryString = '?';
            $queryString .= http_build_query($param);
        }

        if(empty($render))
        {
           header("Location:{$_SERVER['HTTP_REFERER']}");
           exit;
        }else
        {

        $request =  array_filter(explode('/',($_SERVER['REQUEST_URI'])));

        array_pop($request);

        array_push($request,$render.$queryString);

        $header =  static::baseUrl().'/'.implode('/',$request);

        header("Location:$header");
        exit;   

        }                
        
    }

    static function Request(){

        if(!empty($_GET))
            return $_GET;

        if(!empty($_POST))
            return $_POST;

    }

 }